<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UnitesEnseignement;
use App\Models\ElementsConstitutifs;

class ECUTest extends TestCase
{
    use RefreshDatabase;
   
    public function test_creation_ec_avec_coefficient()
    {
        $ue = UnitesEnseignement::factory()->create();

        $response = $this->post(route('elementsConstitutifs.store'), [
            'ue_id' => $ue->id,
            'code' => 'EC10',
            'nom' => 'Analyse',
            'coefficient' => 3
        ]);

        $response->assertRedirect(route('elementsConstitutifs.index'));
        $this->assertDatabaseHas('elements_constitutifs', [
            'code' => 'EC10',
            'nom' => 'Analyse',
            'coefficient' => 3
        ]);
    }
}
