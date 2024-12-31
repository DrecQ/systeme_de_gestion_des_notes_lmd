<?php

use Illuminate\Support\Facades\Route;
use App\Models\UnitesEnseignement;
<<<<<<< HEAD
use App\Models\ElementsConstitutifs;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;
=======
use App\Http\Controllers\UnitesEnseignementController;
>>>>>>> d08d2c863b479e058c7ad01d4acc97098e8df6c9

Route::get('/', function () {
    return view('welcome');
});

//------------Routes pour les UEs------------------------

Route::get('/ue', function () {
    return view('formulaireCreationUe');
});

<<<<<<< HEAD
Route::post('/ue', [UnitesEnseignementController::class, 'store'])->name('insertionUe.store');

//----------Routes pour les ECUes------------------------

Route::get('/ecu', function () {
    return view('formulaireCreationEcu');
});

Route::post('/ecu', [ElementsConstitutifsController::class, 'store'])->name('insertionEcu.store');

//--------------Affichage des ue et ecu 
Route::get('/listeUE',function(){
    return view('listeUnitesEnseignement');
});
 Route::get('/listeUE',[UnitesEnseignementController::class, 'all'])->name('ue.liste');
=======
Route::post('/ue', [UnitesEnseignementController::class, 'store'])->name('insertionUe.store');
>>>>>>> d08d2c863b479e058c7ad01d4acc97098e8df6c9
