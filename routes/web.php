<?php

use Illuminate\Support\Facades\Route;
use App\Models\UnitesEnseignement;
use App\Models\ElementsConstitutifs;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;

Route::get('/', function () {
    return view('welcome');
});

//------------ Routes pour les UEs ------------------------

Route::get('/ue', function () {
    return view('formulaireCreationUe');
});

// Affichage des UEs
Route::get('/listeUE', [UnitesEnseignementController::class, 'all'])->name('ue.liste');

// Insertion d'une nouvelle UE
Route::post('/ue', [UnitesEnseignementController::class, 'store'])->name('insertionUe.store');

//---------- Routes pour les ECUs ------------------------

Route::get('/ecu', function () {
    return view('formulaireCreationEcu');
});

// Affichage des ECUs
Route::get('/listeECU', [ElementsConstitutifsController::class, 'index'])->name('listeECU');

// Affichage du formulaire de création d'un ECU pour une UE spécifique
Route::get('/ecu/{ue}', [ElementsConstitutifsController::class, 'create'])->name('elementsConstitutifs.create');

// Insertion d'un ECU pour une UE spécifique
Route::post('/ecu/{ue}', [ElementsConstitutifsController::class, 'store'])->name('insertionEcu.store');

// Affichage du formulaire de modification d'un ECU
Route::post('/elements-constitutifs', [ElementsConstitutifsController::class, 'store'])->name('elementsConstitutifs.store');
Route::get('/ecu/{id}/edit', [ElementsConstitutifsController::class, 'edit'])->name('elementsConstitutifs.edit');

// Mise à jour d'un ECU
Route::get('/elementsConstitutifs', [ElementsConstitutifsController::class, 'index'])->name('elementsConstitutifs.index');
Route::put('/elementsConstitutifs/{id}', [ElementsConstitutifsController::class, 'update'])->name('elementsConstitutifs.update');

// Suppression d'un ECU
Route::get('/elementsConstitutifs/{id}', [ElementsConstitutifsController::class, 'destroy'])->name('elementsConstitutifs.destroy');
Route::delete('/elementsConstitutifs/{id}', [ElementsConstitutifsController::class, 'destroy'])->name('elementsConstitutifs.destroy');
