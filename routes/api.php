<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Authentification;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\PublicationController;

// Routes publiques
Route::post('/register', [Authentification::class, 'register']);
Route::post('/login', [Authentification::class, 'login']);

Route::middleware('jwt')->group(function () {
    // Route pour enregistrer une publication
    Route::get('/publication', [PublicationController::class, 'index']);
    Route::post('/publication', [PublicationController::class, 'store']);
    Route::get('publication/{userId}', [PublicationController::class, 'getUserPublications']);
    Route::get('/search', [PublicationController::class, 'searchQuery']);
    //Routes pour qui es abonnee a moi oui je suis qui
    Route::post('follow/{id}', [FollowController::class, 'follow']);
    Route::delete('unfollow/{id}', [FollowController::class, 'unfollow']);
    Route::get('is-following/{userId}', [FollowController::class, 'isFollowing']);
    //Route pour un user

    Route::post('logout', [Authentification::class, 'logout']);
});
Route::get('choose-analyst', [UserController::class, 'listAnalystes']);
