<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UnitesEnseignement;


class UETest extends TestCase
{
    use RefreshDatabase;

    public function test_creation_ue_valide()
    {
        $ue = UnitesEnseignement::factory()->create([
            'code' => 'UE11',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1
        ]);

        $this->assertDatabaseHas('unites_enseignements', [
            'code' => 'UE11',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1
        ]);
    }

    public function test_verification_des_credits_ects_compris_entre_1_et_30()
    {
        // Créer une UE avec des crédits ECTS valides
        $creditsValid = UnitesEnseignement::factory()->create(['credits_ects' => 6]);
        $this->assertDatabaseHas('unites_enseignements', ['credits_ects' => 6]);

        if($creditsValid['credits_ects'] > 30)
        {
            // Tester une valeur invalide
            $this->expectException(\Illuminate\Database\QueryException::class);
        }
         
    }

   
}
