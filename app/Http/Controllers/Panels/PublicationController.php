<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    //
    public function index()
    {
        return view('admin.publications.listes_publications');
    }
}

