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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiants')->onDelete('cascade'); // Lien avec la table etudiants
            $table->string('ec_id'); // ID de l'EC
            $table->float('note'); // La note de l'étudiant
            $table->enum('session', ['normale', 'rattrapage']); // Session de l'examen
            $table->date('date_evaluation'); // Date de l'évaluation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
