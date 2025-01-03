<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('numero_etudiant')->unique(); // Numéro unique de l'étudiant
            $table->string('nom'); // Nom de l'étudiant
            $table->string('prenom'); // Prénom de l'étudiant
            $table->enum('niveau', ['L1', 'L2', 'L3']); // Niveau (L1, L2, L3)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
