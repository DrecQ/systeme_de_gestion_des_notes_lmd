<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementsConstitutifs extends Model
{
    use HasFactory;

    protected $fillable = ['ue_id', 'code', 'nom', 'coefficient'];

    public function unitesEnseignement()
    {
        return $this->belongsTo(UnitesEnseignement::class, 'ue_id');
    }
}
