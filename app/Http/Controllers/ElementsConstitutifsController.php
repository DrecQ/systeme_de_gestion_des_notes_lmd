<?php

namespace App\Http\Controllers;

use App\Models\ElementsConstitutifs;
use App\Models\UnitesEnseignement;
use Illuminate\Http\Request;

class ElementsConstitutifsController extends Controller
{
    public function index()
    {
        return view('formulaireCreationEcu');
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
            'coefficient' => 'required|numeric|max:10',
            'ue_id' => 'required|exists:unites_enseignements,id'
        ]);

        ElementsConstitutifs::create([
            'code' => $validate['code'],
            'nom' => $validate['nom'],
            'coefficient' => $validate['coefficient'],
            'ue_id' => $validate['ue_id']
        ]);

        return redirect()->route('ue.liste')->with('success', 'Élément constitutif ajouté avec succès.');
    }
}
