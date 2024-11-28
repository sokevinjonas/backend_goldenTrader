<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index()
    {
        return view('admin.abonnements.index');
    }
}
