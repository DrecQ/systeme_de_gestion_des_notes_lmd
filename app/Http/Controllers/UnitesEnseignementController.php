<?php

namespace App\Http\Controllers;

use App\Models\UnitesEnseignement;
use Illuminate\Http\Request;

class UnitesEnseignementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation des données des champs

        $validate = $request->validate([
            'code' => 'required | string | max:10 | unique:unites_enseignements',
            'nom' => 'required | string | max:255',
            'credits_ects' => 'required| integer | min:1 | max:30',
            'semestre' => 'required | integer'
        ]);

        //Creation des enregistrements 
        UnitesEnseignement::create([
            'code' => $validate['code'],
            'nom' => $validate['nom'],
            'credits_ects'=>$validate['credits_ects'],
            'semestre' => $validate['semestre']
        ]);

        return  redirect('/listeUE')->with('success', 'Enregistrement réussie');
    }

    //Afficher toutes les UEs

    public function all()
    {
        $ues = UnitesEnseignement::orderBy('semestre')->get();

        return view('listeUnitesEnseignement', compact('ues'));
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitesEnseignement $unitesEnseignement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitesEnseignement $unitesEnseignement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitesEnseignement $unitesEnseignement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitesEnseignement $unitesEnseignement)
    {
        //
    }
}
