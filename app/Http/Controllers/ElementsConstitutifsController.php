<?php

namespace App\Http\Controllers;

use App\Models\ElementsConstitutifs;
use App\Models\UnitesEnseignement;
use Illuminate\Http\Request;

class ElementsConstitutifsController extends Controller
{
    public function index()
    {
        // $ues = UnitesEnseignement::with('elementsConstitutifs')->get();
        // $ues = UnitesEnseignement::with('elementsConstitutifs')->orderBy('semestre', 'asc')->get();
        $ues = UnitesEnseignement::with('elementsConstitutifs')->orderBy('semestre', 'asc')->get()->groupBy('semestre');
        
        return view('listeECU', compact('ues'));
    }
    


    public function create($ue)
    {
        $ue = UnitesEnseignement::find($ue);
        if (!$ue) {
            return redirect()->back()->with('error', 'Unité d\'enseignement non trouvée.');
        }
        return view('formulaireCreationEcu', compact('ue'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'code' => 'required|string|max:10|unique:elements_constitutifs',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|max:10',
            'ue_id' => 'required|exists:unites_enseignements,id'
        ]);

        ElementsConstitutifs::create([
            'code' => $validate['code'],
            'nom' => $validate['nom'],
            'coefficient' => $validate['coefficient'],
            'ue_id' => $validate['ue_id']
        ]);

        return redirect('/listeECU')->with('success', 'Élément constitutif ajouté avec succès.');
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
