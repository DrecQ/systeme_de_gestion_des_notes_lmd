<?php

use Illuminate\Support\Facades\Route;
use App\Models\UnitesEnseignement;
use App\Models\ElementsConstitutifs;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

//------------ Routes pour les UEs ------------------------

Route::get('/ue', function () {
    return view('formulaireCreationUe');
});

//Affichage du formulaire des etudiants
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant');

//Affichage du formulaire des notes
Route::get('/note', [NoteController::class, 'index'])->name('note');


// Affichage des UEs
Route::get('/listeUE', [UnitesEnseignementController::class, 'all'])->name('ue_id');

// Insertion d'une nouvelle UE
Route::post('/ue', [UnitesEnseignementController::class, 'store'])->name('insertionUe.store');

//---------- Routes pour les ECs ------------------------

Route::get('/ec', function () {
    return view('formulaireCreationEcu');
});


// Affichage des ECUs
Route::get('/listeEC', [ElementsConstitutifsController::class, 'index'])->name('listeECU');

// Affichage du formulaire de création d'un ECU pour une UE spécifique
Route::get('/ec/{ue}', [ElementsConstitutifsController::class, 'create'])->name('elementsConstitutifs.create');
// Insertion d'un ECU pour une UE spécifique
Route::post('/ec/{ue}', [ElementsConstitutifsController::class, 'store'])->name('insertionEcu.store');

// Affichage du formulaire de modification d'un ECU
Route::get('/ec/{id}/edit', [ElementsConstitutifsController::class, 'edit'])->name('elementsConstitutifs.edit');
Route::post('/elements-constitutifs', [ElementsConstitutifsController::class, 'store'])->name('elementsConstitutifs.store');

// Mise à jour d'un ECU
Route::get('/elementsConstitutifs', [ElementsConstitutifsController::class, 'index'])->name('elementsConstitutifs.index');
Route::put('/elementsConstitutifs/{id}', [ElementsConstitutifsController::class, 'update'])->name('elementsConstitutifs.update');

// Suppression d'un ECU
Route::get('/elementsConstitutifs/{id}', [ElementsConstitutifsController::class, 'destroy'])->name('elementsConstitutifs.destroy');
Route::delete('/elementsConstitutifs/{id}', [ElementsConstitutifsController::class, 'destroy'])->name('elementsConstitutifs.destroy');
