<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::resource('notes',NoteController::class);
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Route::get('/resultats', [ResultatController::class, 'index'])->name('resultats.index');
Route::get('/resultats/{etudiant}', [ResultatController::class, 'show'])->name('resultats.show');

Route::resource('ues', UnitesEnseignementController::class);


Route::resource('ecs', ElementsConstitutifsController::class);

