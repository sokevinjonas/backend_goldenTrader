<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authentification extends Controller
{
    // User registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string'
        ],
        [
            'name.required' => 'Le champ nom est requis.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.max' => 'Le champ nom ne doit pas dépasser 50 caractères.',

            'email.required' => 'Le champ email est requis.',
            'email.string' => 'Le champ email doit être une chaîne de caractères.',
            'email.email' => 'Le format de l\'email est invalide.',
            'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'L\'email existe déjà.',

            'password.required' => 'Le champ mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',

            'role.required' => 'Le champ rôle est requis.',
            'role.string' => 'Le rôle doit être une chaîne de caractères.',
        ]);

        if($validator->fails()){
            // return response()->json($validator->errors()->toJson(), 400);
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'password' => Hash::make($request->get('password')),
        ]);

        return response()->json(compact('user'), 201);
    }

     // User login
     public function login(Request $request)
     {
         $credentials = $request->only('email', 'password');

         try {
             if (! $token = JWTAuth::attempt($credentials)) {
                 return response()->json(['error' => 'Invalid credentials'], 401);
             }

             // Get the authenticated user.
             $user = auth()->user();

              // Vérifier si c'est sa première connexion
            if ($user->first_connexion === 0) {
                // Mettre à jour 'first_connexion' à true
                $user->first_connexion = 1;
                $user->save(); // Sauvegarder la mise à jour dans la base de données
            }
             return response()->json(compact('token'));
         } catch (JWTException $e) {
             return response()->json(['error' => 'Could not create token'], 500);
         }
     }

     // User logout
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
