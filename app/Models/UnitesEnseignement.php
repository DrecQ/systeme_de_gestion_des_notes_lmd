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
}
