<?php

namespace App\Http\Controllers\Api;

use Log;
use Exception;
use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Events\FluxPublications;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PublicationController extends Controller
{
    public function index()
    {
         // Récupère l'utilisateur connecté
        $currentUserId = auth()->user()->id;
         // Récupère toutes les publications avec les informations de suivi
         $publications = Publication::with('user')->get()->map(function ($publication) use ($currentUserId) {
            $publication->isFollowed = $publication->user->isFollowedBy($currentUserId);
            return $publication;
        });

        return response()->json([
            'message' => 'Liste des publications dans la fil d\'actualité',
            'data' => $publications,
        ], 201);

        return response()->json([
            'message' => 'Liste des publications dans la fil d\'actualité',
            'data' => $data,
        ], 201);

    }
    //
    public function store(Request $request)
    {
        try {
            // Démarrer une transaction
            DB::beginTransaction();

            // Valider les données de la requête
            $validatedData = $request->validate([
                'content' => 'required|string|max:500',
                'images' => 'nullable|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ], [
                'content.required' => 'Le champ contenu est requis.',
                'content.string' => 'Le champ contenu doit être une chaîne de caractères.',
                'content.max' => 'Le champ contenu ne doit pas excéder 500 caractères.',
                'images.array' => 'Les images doivent être fournies sous forme de tableau.',
                'images.*.required' => 'Chaque image est requise.',
                'images.*.image' => 'Le fichier doit être une image.',
                'images.*.mimes' => 'Les images doivent être au format jpg, jpeg ou png.',
                'images.*.max' => 'Chaque image ne doit pas dépasser 2 Mo.'
            ]);

            // Vérifier que l'utilisateur est un analyste
            if (Auth::user()->role !== 'analyst') {
                return response()->json([
                    'success' => false,
                    'message' => 'Accès non autorisé. Seuls les analystes peuvent créer des publications.'
                ], 403);
            }

            // Initialiser un tableau pour stocker les informations des images
            $imagesPaths = [];

            // Traiter les images si présentes
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    try {
                        // Générer un nom unique pour l'image
                        $fileName = time() . '_' . $index . '_' . $image->getClientOriginalName();

                        // Définir le chemin de stockage
                        $path = $image->storeAs(
                            'publications/' . date('Y/m'),
                            $fileName,
                            'public'
                        );

                        if (!$path) {
                            throw new Exception('Erreur lors du stockage de l\'image ' . $index);
                        }

                        // Ajouter le chemin au tableau avec des informations supplémentaires
                        $imagesPaths[] = [
                            'path' => Storage::url($path),
                            'name' => $fileName,
                            'size' => $image->getSize(),
                            'mime' => $image->getMimeType()
                        ];
                    } catch (\Exception $e) {
                        // En cas d'erreur, supprimer les images déjà uploadées
                        foreach ($imagesPaths as $savedImage) {
                            Storage::disk('public')->delete(str_replace('/storage/', '', $savedImage['path']));
                        }
                        throw $e;
                    }
                }
            }

            // Créer la publication
            $publication = Publication::create([
                'content' => $validatedData['content'],
                'images' => !empty($imagesPaths) ? json_encode($imagesPaths) : null,
                'analyst_id' => Auth::id(),
            ]);

            // Valider la transaction
            event(new FluxPublications($publication)); //  diffusez l'événement

            DB::commit();

            // Retourner la réponse
            return response()->json([
                'success' => true,
                'message' => 'Publication créée avec succès',
                'data' => [
                    'publication' => $publication,
                    'images' => $imagesPaths
                ]
            ], 201);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            DB::rollBack();

            // Log l'erreur pour le débogage
            Log::error('Erreur lors de la création de la publication:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la création de la publication',
                'debug_message' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
    // public function show(Publication $publication)
    // {

    // }

    public function getUserPublications($userId)
    {
        // Récupère l'utilisateur avec ses publications associées
        $user = User::with('publications')->find($userId);
        // followers
        // compter le nombre de abonnee qui suis $user
        $cpt = $user->followers()->count();
        // Vérifie si l'utilisateur existe
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur non trouvé',
            ], 404);
        }
        return response()->json([
            'message' => 'Publications de l\'utilisateur',
            'data' => [
                'user' => $user,
                'publications' => $user->publications,
                'followers' => $cpt
            ],
        ], 200);
    }

}
