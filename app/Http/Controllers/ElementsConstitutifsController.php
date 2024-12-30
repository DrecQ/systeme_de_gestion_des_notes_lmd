<?php

namespace App\Http\Controllers;

use App\Models\ElementsConstitutifs;
use Illuminate\Http\Request;

class ElementsConstitutifsController extends Controller
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
        
        $validate->$request->validate([
            'code' => 'required | string | max:10 | unique:unites_enseignements',
            'nom' => 'required | string | max:255',
            'coefficient' => 'required | max : 10',
            'ue_id' => 'required'
        ]);

        //Créer un enregistrement
        ElementsConstitutifs::create([
            'code' => $validate['code'],
            'nom' => $validate['nom'],
            'coefficient' => $validate['coefficient'],
            'ue_id' => $validate['ue_id']

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ElementsConstitutifs $elementsConstitutifs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElementsConstitutifs $elementsConstitutifs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElementsConstitutifs $elementsConstitutifs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElementsConstitutifs $elementsConstitutifs)
    {
        //
    }
}
