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
}
