<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authentification;
use App\Http\Controllers\Api\PublicationController;

// Routes publiques
Route::post('/register', [Authentification::class, 'register']);
Route::post('/login', [Authentification::class, 'login']);

Route::middleware('jwt')->group(function () {
    // Route pour enregistrer une publication
    Route::post('/publication', [PublicationController::class, 'store']);

    Route::post('logout', [Authentification::class, 'logout']);
});
