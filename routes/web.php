<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/utlisateur', function () {
    return view('admin.utilisateurs.listes_utilisateurs');
});
Route::get('/publication', function () {
    return view('admin.publications.listes_publications');
});

Route::get('/abonnement', function () {
    return view('admin.abonnements.index');
});
Route::get('/parrainage', function () {
    return view('admin.parrainage.index');
});
