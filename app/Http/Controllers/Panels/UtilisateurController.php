<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //
    public function index()
    {
        return view('admin.utilisateurs.listes_utilisateurs');
    }
}
