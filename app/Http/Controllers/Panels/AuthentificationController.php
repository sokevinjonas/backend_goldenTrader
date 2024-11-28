<?php

namespace App\Http\Controllers\Panels;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthentificationController extends Controller
{
    public function create()
    {
        return view('admin.authentification.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

         // Si l'email n'existe pas
        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'Cette adresse mail n\'existe pas, Ressayer.',
            ])->onlyInput('email');
        }

        // Si le mot de passe est incorrect
        return back()->withErrors([
            'password' => 'Le mot de passe que vous avez saisi est incorrect.',
        ])->onlyInput('email');
    }
}
