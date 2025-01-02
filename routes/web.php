<?php

use Illuminate\Support\Facades\Route;
use App\Models\UnitesEnseignement;
use App\Models\ElementsConstitutifs;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;

Route::get('/', function () {
    return view('welcome');
});

//------------Routes pour les UEs------------------------

Route::get('/ue', function () {
    return view('formulaireCreationUe');
});


//--------------Affichage des UEs------------------------

Route::get('/listeUE', function () {
    return view('listeUnitesEnseignement');
});

Route::get('/listeUE', [UnitesEnseignementController::class, 'all'])->name('ue.liste');


Route::post('/ue', [UnitesEnseignementController::class, 'store'])->name('insertionUe.store');

//----------Routes pour les ECUs------------------------

Route::get('/ecu', function () {
    return view('formulaireCreationEcu');
});

Route::post('/ecu', [ElementsConstitutifsController::class, 'store'])->name('insertionEcu.store');


//----------------Affichage des ECUs------------------------

Route::get('/ecu/{ue}', [ElementsConstitutifsController::class, 'create'])->name('ue_id');
Route::post('/ecu/{ue}', [ElementsConstitutifsController::class, 'store'])->name('insertionEcu.store');

