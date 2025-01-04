<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    /**
     * Affiche les résultats de tous les étudiants.
     */
    public function index()
    {
        // Récupérer tous les étudiants avec leurs Unités d'Enseignement (UE) et leurs matières (EC)
        $etudiants = Etudiant::with(['ues.ecs.notes'])->get();

        // Préparer les résultats pour chaque étudiant
        $results = $etudiants->map(function ($etudiant) {
            return [
                'etudiant' => $etudiant,
                'results' => $etudiant->getResults(),
            ];
        });

        // Retourner la vue avec les résultats
        return view('resultats.index', compact('results'));
    }

    /**
     * Affiche les résultats d'un étudiant spécifique.
     */
    public function show(Etudiant $etudiant)
    {
        // Récupérer les résultats de l'étudiant spécifique
        $results = $etudiant->getResults();

        // Retourner la vue avec les résultats de l'étudiant
        return view('resultats.show', compact('etudiant', 'results'));
    }
}
