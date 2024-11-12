<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * Suivre un utilisateur.
     */
    public function follow(Request $request, $id)
    {
        $user = auth()->user(); // L'utilisateur authentifié

        // Vérifiez si l'utilisateur suivi a le rôle d'analyst
        $followedUser = User::findOrFail($id);
        if ($followedUser->role !== 'analyst') {
            return response()->json(['message' => 'Vous ne pouvez suivre que des analystes.'], 403);
        }

        $user->followings()->attach($id);

        return response()->json(['message' => 'Utilisateur suivi avec succès.']);
    }

    /**
     * Arrêter de suivre un utilisateur.
     */
    public function unfollow(Request $request, $id)
    {
        $user = auth()->user();
        $user->followings()->detach($id);

        return response()->json(['message' => 'Vous avez arrêté de suivre cet utilisateur.']);
    }
}
