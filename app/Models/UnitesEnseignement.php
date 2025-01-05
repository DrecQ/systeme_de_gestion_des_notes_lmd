<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitesEnseignement extends Model
{
    //Protection des données
    protected $fillable = ['code', 'nom'];

    public function ElementsConstitutifs()
    {
        return $this->hasMany(ElementsConstitutifs::class);
    }

    public function calculerMoyenne($etudiantId)
    {
        $ecs = $this->elementsConstitutifs;
        $totalNotes = 0;
        $totalCoefficients = 0;

        foreach ($ecs as $ec) {
            $note = $ec->notes()->where('etudiant_id', $etudiantId)->first();
            if ($note) {
                $totalNotes += $note->note * $ec->coefficient;
                $totalCoefficients += $ec->coefficient;
            }
        }

        return $totalCoefficients > 0 ? $totalNotes / $totalCoefficients : null;
    }
}
