<?php

namespace App\Http\Controllers;

use App\Models\ElementsConstitutifs;
use App\Models\UnitesEnseignement;
use Illuminate\Http\Request;

class ElementsConstitutifsController extends Controller
{
    public function index()
    {
        $ues = UnitesEnseignement::with('elementsConstitutifs')->orderBy('semestre', 'asc')->get()->groupBy('semestre');
        return view('listeECU', compact('ues'));
    }

    public function create($ue)
    {
        // Recherche l'UE en fonction de l'ID passé
        $ue = UnitesEnseignement::find($ue);

        // Si l'UE n'est pas trouvé, rediriger avec un message d'erreur
        if (!$ue) {
            return redirect()->back()->with('error', 'Unité d\'enseignement non trouvée.');
        }

        // Passe la variable $ue à la vue
        return view('formulaireCreationEcu', compact('ue'));
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validate = $request->validate([
            'code' => 'required|string|max:10|unique:elements_constitutifs',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|max:10',
            'ue_id' => 'required|exists:unites_enseignements,id', // Vérifie que l'ID de l'UE existe
        ]);

        // Création de l'élément constitutif
        ElementsConstitutifs::create([
            'code' => $validate['code'],
            'nom' => $validate['nom'],
            'coefficient' => $validate['coefficient'],
            'ue_id' => $validate['ue_id'], // Enregistrement de l'ID de l'UE
        ]);

        // Redirection avec un message de succès
        return redirect()->route('elementsConstitutifs.index')->with('success', 'Élément constitutif ajouté avec succès.');
    }

    public function edit($id)
    {
        $elementConstitutif = ElementsConstitutifs::findOrFail($id);
        $ue = UnitesEnseignement::findOrFail($elementConstitutif->ue_id);  // Récupérer l'UE associée si nécessaire
    
        return view('formulaireModificationEcu', compact('elementConstitutif', 'ue'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:elements_constitutifs,code,' . $id,
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1|max:5', // Validation du coefficient
            'ue_id' => 'required|exists:unites_enseignements,id', // Validation de l'UE
        ]);

        // Récupération de l'ECU à mettre à jour
        $ec = ElementsConstitutifs::findOrFail($id);

        // Mise à jour de l'ECU
        $ec->update([
            'code' => $validated['code'],
            'nom' => $validated['nom'],
            'coefficient' => $validated['coefficient'],
            'ue_id' => $validated['ue_id'], // Mise à jour de l'UE associée
        ]);

        // Redirection avec message de succès
        return redirect()->route('elementsConstitutifs.index')->with('success', 'ECU modifié avec succès.');
    }

    public function destroy($id)
    {
        // Récupération de l'élément constitutif à supprimer
        $elementConstitutif = ElementsConstitutifs::findOrFail($id);

        // Suppression de l'élément constitutif
        $elementConstitutif->delete();

        // Redirection avec message de succès
        return redirect()->route('elementsConstitutifs.index')->with('success', 'Élément constitutif supprimé avec succès.');
    }
}
