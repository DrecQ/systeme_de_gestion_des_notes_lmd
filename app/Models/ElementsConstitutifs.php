<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementsConstitutifs extends Model
{
    protected $fillable = ['ue_id', 'code', 'nom', 'credits_ects'];

    public function UnitesEnseignement()
    {
        return $this->belongsTo(UnitesEnseignement::class);
    }
}
