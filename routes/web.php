<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panels\DashboardController;
use App\Http\Controllers\Panels\AbonnementController;
use App\Http\Controllers\Panels\ParrainageController;
use App\Http\Controllers\Panels\PublicationController;
use App\Http\Controllers\Panels\UtilisateurController;
use App\Http\Controllers\Panels\AuthentificationController;

// Route de connexion (accessible sans authentification)
Route::get('/login', [AuthentificationController::class, 'create'])->name('login');
Route::post('/authenticate', [AuthentificationController::class, 'authenticate'])->name('authenticate');

// Groupes de routes protégées par le middleware 'auth' (connexion requise)
Route::middleware('auth')->group(function () {

    //Routes vers le Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes vers le controller UtilisateurController
    Route::get('/utilisateurs-listes', [UtilisateurController::class, 'index'])->name('listes_utilisateurs');
    // Routes vers le controller PublicationController
    Route::get('/publications-listes', [PublicationController::class, 'index'])->name('listes_publications');
    // Routes vers le controller AbonnementController
    Route::get('/abonnement', [AbonnementController::class, 'index'])->name('abonnement');
    Route::post('/store-abonnement', [AbonnementController::class, 'store'])->name('store_abonnement');
    Route::delete('/abonnement/{id}', [AbonnementController::class, 'destroy'])->name('delete_abonnement');
    Route::get('/abonnement/{id}/edit', [AbonnementController::class, 'edit'])->name('edit_abonnement');
      // Routes vers le controller ParrainageController
      Route::get('/parrainage', [ParrainageController::class, 'index'])->name('parrainage');
});

