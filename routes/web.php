<?php

use Illuminate\Support\Facades\Route;
use App\Models\UnitesEnseignement;
use App\Http\Controllers\UnitesEnseignementController;

Route::get('/', function () {
    return view('welcome');
});

//------------Routes pour les UEs------------------------

Route::get('/ue', function () {
    return view('formulaireCreationUe');
});

Route::post('/ue', [UnitesEnseignementController::class, 'store'])->name('insertionUe.store');