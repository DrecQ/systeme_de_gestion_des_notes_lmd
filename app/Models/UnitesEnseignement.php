<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitesEnseignement extends Model
{
    use HasFactory;
    
    //Protection des données

    protected $fillable = ['code', 'nom', 'credits_ects', 'semestre'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($ue) {
            if (!preg_match('/^UE\d{2}$/', $ue->code)) {
                throw new \Exception('Le code UE doit suivre le format UExx.');
            }
            if ($ue->semestre < 1 || $ue->semestre > 6) {
                throw new \Exception('Le semestre doit être compris entre 1 et 6.');
            }
        });
    }

    public function elementsConstitutifs()
    {
        return $this->hasMany(ElementsConstitutifs::class, 'ue_id');
    }
}
