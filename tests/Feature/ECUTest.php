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

    public function test_verification_du_rattachement_d_un_ec_a_une_ue()
    {
        $ue = UnitesEnseignement::factory()->create();
        $ec = ElementsConstitutifs::factory()->create(['ue_id' => $ue->id]);

        $this->assertEquals($ue->id, $ec->ue_id);
    }

    use RefreshDatabase;

    public function test_modification_d_un_ec()
    {
        $ue = UnitesEnseignement::factory()->create(); 

        $ec = ElementsConstitutifs::factory()->create([
            'code' => 'UE20',
            'nom' => 'Français',
            'coefficient' => 2,
            'ue_id' => $ue->id, 
        ]);

        // Modifier l'EC existant
        $response = $this->put(route('elementsConstitutifs.update', $ec->id), [
            'code' => 'UE20',
            'nom' => 'Physique',
            'coefficient' => 4,
            'ue_id' => $ue->id, 
        ]);

        $response->assertRedirect(route('elementsConstitutifs.index'));

        // Vérifier que les données modifiées sont bien enregistrées dans la base de données
        $this->assertDatabaseHas('elements_constitutifs', [
            'id' => $ec->id,
            'code' => 'UE20',
            'nom' => 'Physique',
            'coefficient' => 4,
            'ue_id' => $ue->id, 
        ]);
    }

    use RefreshDatabase;
    public function test_validation_du_coefficient_entre_1_et_5()
    {
        $ue = UnitesEnseignement::factory()->create();


        $response = $this->post(route('elementsConstitutifs.store'), [
            'code' => 'UE28',
            'nom' => 'Mathématiques',
            'coefficient' => 5,  
            'ue_id' => $ue->id
        ]);
    
        // Vérifier si la requête a été acceptée
        $response->assertRedirect(route('elementsConstitutifs.index'));
    
        // Vérifier si l'EC a bien été créé dans la base de données
        $this->assertDatabaseHas('elements_constitutifs', [
            'code' => 'UE28',
            'nom' => 'Mathématiques',
            'coefficient' => 5
        ]);
    }

    public function test_suppression_d_un_ec()
    {
    $ue = UnitesEnseignement::factory()->create();

    // Creation d'un EC
    $ec = ElementsConstitutifs::factory()->create([
        'code' => 'UE21',
        'nom' => 'Mathématiques',
        'coefficient' => 4,
        'ue_id' => $ue->id,
    ]);

    // Vérifier que l'EC existe avant la suppression
    $this->assertDatabaseHas('elements_constitutifs', [
        'id' => $ec->id,
        'code' => 'UE21',
        'nom' => 'Mathématiques',
        'coefficient' => 4,
    ]);

    // Effectuer une requête de suppression
    $response = $this->delete(route('elementsConstitutifs.destroy', $ec->id));

    // Vérifier que la requête a entraîné une redirection vers la page d'index
    $response->assertRedirect(route('elementsConstitutifs.index'));

    // Vérifier que l'EC a bien été supprimé de la base de données
    $this->assertDatabaseMissing('elements_constitutifs', [
        'id' => $ec->id,
        'code' => 'UE21',
        'nom' => 'Mathématiques',
        'coefficient' => 4,
    ]);
    }


}
