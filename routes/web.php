<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panels\DashboardController;
use App\Http\Controllers\Panels\PublicationController;
use App\Http\Controllers\Panels\UtilisateurController;

// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/utlisateur', function () {
//     return view('admin.utilisateurs.listes_utilisateurs');
// });
// Route::get('/publication', function () {
//     return view('admin.publications.listes_publications');
// });

// Route::get('/abonnement', function () {
//     return view('admin.abonnements.index');
// });
// Route::get('/parrainage', function () {
//     return view('admin.parrainage.index');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/utilisateurs-listes', [UtilisateurController::class, 'index'])->name('listes_utilisateurs');
Route::get('/publications-listes', [PublicationController::class, 'index'])->name('listes_publications');
