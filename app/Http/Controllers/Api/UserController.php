<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function listAnalystes()
    {
        $currentUserId = auth()->id();
        // Récupérer les analystes, exclure l'utilisateur connecté, et limiter à 9 résultats aléatoires
        $users = User::where('role', 'analyst')
        ->where('id', '!=', $currentUserId) // Exclure l'utilisateur connecté
        ->inRandomOrder()
        ->take(9)
        ->get();

        // Retourner une réponse JSON structurée
        return response()->json([
            'message' => "Liste des analystes sur la page Choix analystes",
            'data' => $users
        ], 200);
    }
}
