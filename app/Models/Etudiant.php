<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    // Définir les champs qui peuvent être remplis par l'utilisateur
    protected $fillable = [
        'numero_etudiant',
        'nom',
        'prenom',
        'niveau',
    ];

    // Relation avec la table "notes"
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function moyenne ()
    {
            $notes = $this->notes;
        if ($notes->isEmpty()) {
            return 0;
        }

        $somme = $notes->sum(fn($note) => $note->note);
        return $somme / $notes->count();
    }

}
