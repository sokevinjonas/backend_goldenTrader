<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authentification;

// Routes publiques
Route::post('/register', [Authentification::class, 'register']);
Route::post('/login', [Authentification::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::post('logout', [Authentification::class, 'logout']);
});
