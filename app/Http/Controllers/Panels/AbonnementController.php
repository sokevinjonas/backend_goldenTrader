<?php

namespace App\Http\Controllers\Panels;

use App\Models\Abonnement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbonnementController extends Controller
{
    public function index()
    {
        $abonnement = Abonnement::all();
        return view('admin.abonnements.index', compact('abonnement'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validation des données
        $validated = $request->validate([
            'type' => 'required|in:premium,vip',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|in:14,30',
        ]);

        // Enregistrement de l'abonnement
        $abonnement = Abonnement::create([
            'price' => $validated['price'],
            'type' => $validated['type'],
            'duration' => $validated['duration'],
            'admin_id' => auth()->user()->id, // Assurez-vous que l'utilisateur est connecté
        ]);

        return redirect()->back()->with('success', 'Abonnement ajouté avec succès.');
    }

    public function destroy($id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $abonnement->delete();

        return redirect()->back()->with('success', 'Abonnement supprimé avec succès.');
    }

}
