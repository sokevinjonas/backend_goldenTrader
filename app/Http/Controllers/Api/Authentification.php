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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string'
        ],
        [
            'name.required' => 'Le champ nom est requis.',
            'email.required' => 'Le champ email est requis.',
            'email.unique' => 'L\'email existe deja.',
            'password.required' => 'Le champ mot de passe est requis.',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
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
