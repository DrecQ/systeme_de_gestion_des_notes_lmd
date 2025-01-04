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
    public function ues()
    {
        return $this->belongsToMany(UE::class)->withPivot('note');
    }
    public function getResults()
    {
        $results = [];
        foreach ($this->ues as $ue) {
            $total = 0;
            $coefficients = 0;

            foreach ($ue->ecs as $ec) {
                $note = $ec->notes->where('etudiant_id', $this->id)->first()->note ?? 0;
                $total += $note * $ec->coefficient;
                $coefficients += $ec->coefficient;
            }

            $average = $coefficients > 0 ? $total / $coefficients : 0;
            $results[] = [
                'ue' => $ue->nom,
                'average' => $average,
                'validated' => $average >= 10, // Validation si moyenne >= 10
            ];
        }

        return $results;
    }

}
