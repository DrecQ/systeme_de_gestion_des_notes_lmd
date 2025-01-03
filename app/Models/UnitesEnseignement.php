<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitesEnseignement extends Model
{
    use HasFactory;
    
    //Protection des données

    protected $fillable = ['code', 'nom', 'credits_ects', 'semestre'];

    public function elementsConstitutifs()
    {
        return $this->hasMany(ElementsConstitutifs::class, 'ue_id');
    }
}
