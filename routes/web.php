<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panels\DashboardController;
use App\Http\Controllers\Panels\AbonnementController;
use App\Http\Controllers\Panels\PublicationController;
use App\Http\Controllers\Panels\UtilisateurController;
use App\Http\Controllers\Panels\AuthentificationController;

// Route de connexion (accessible sans authentification)
Route::get('/login', [AuthentificationController::class, 'create'])->name('login');
Route::post('/authenticate', [AuthentificationController::class, 'authenticate'])->name('authenticate');

// Groupes de routes protégées par le middleware 'auth' (connexion requise)
Route::middleware('auth')->group(function () {

    // Dashboard accessible uniquement aux utilisateurs authentifiés
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Autres pages accessibles aux utilisateurs authentifiés
    Route::get('/utilisateurs-listes', [UtilisateurController::class, 'index'])->name('listes_utilisateurs');
    Route::get('/publications-listes', [PublicationController::class, 'index'])->name('listes_publications');
    Route::get('/abonnement', [AbonnementController::class, 'index'])->name('abonnement');

});

