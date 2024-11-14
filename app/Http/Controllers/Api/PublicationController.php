<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // Valider les données de la requête
        $validatedData = $request->validate([
            'content' => 'required|string|max:500', // Limiter la longueur du contenu si nécessaire
            'images' => 'nullable|array', // Les images doivent être un tableau de fichiers
            'images.*' => 'file|mimes:jpg,jpeg,png|max:2048', // Validation pour chaque fichier (limite de taille 2MB)
        ], [
            'content.required' => 'Le champ contenu est requis.',
            'content.string' => 'Le champ contenu doit être une chaîne de caractères.',
            'content.max' => 'Le champ contenu ne doit pas excéder 500 caractères.',
            'images.array' => 'Les images doivent être fournies sous forme de tableau.',
            'images.*.file' => 'Chaque image doit être un fichier valide.',
            'images.*.mimes' => 'Les images doivent être au format jpg, jpeg ou png.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 2 Mo.',
        ]);

        // Vérifier que l'utilisateur est un analyste
        if (Auth::user()->role !== 'analyst') {
            return response()->json(['error' => 'Seuls les analystes peuvent créer des publications'], 403);
        }

        // Initialiser un tableau pour stocker les chemins des images
        $imagePaths = [];

        // Si des images sont présentes, les stocker
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Sauvegarder chaque image dans le stockage public (ou dans un autre répertoire de votre choix)
                $path = $image->store('public/publication_images');
                // Enregistrer le chemin relatif dans le tableau
                $imagePaths[] = Storage::url($path);
            }
        }

        // Créer la publication avec les chemins des images encodés en JSON
        $publication = Publication::create([
            'content' => $validatedData['content'],
            'images' => json_encode($imagePaths),
            'analyst_id' => Auth::id(), // ID de l'utilisateur authentifié
        ]);

        return response()->json([
            'message' => 'Publication créée avec succès',
            'publication' => $publication,
        ], 201);
    }
    // public function show(Publication $publication)
    // {

    // }

    public function getUserPublications($userId)
    {
        // Récupère l'utilisateur avec ses publications associées
        $user = User::with('publications')->find($userId);

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
            ],
        ], 200);
    }

}
