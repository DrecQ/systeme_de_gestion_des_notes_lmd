<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UETest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreationUEValide()
    {
        $response = $this->post('/ues', [
            'nom' => 'Programmation',
            'code' => 'UE01',
            'credits' => 6,
            'semestre' => 1,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('ues', ['nom' => 'Programmation']);
    }

    public function testValidationCreditsECTS()
    {
        $response = $this->post('/ues', ['credits' => 31]);
        $response->assertSessionHasErrors('credits');
    }

    public function testAssociationECtoUE()
    {
        $ue = UE::factory()->create();

        $ec = EC::factory()->create(['ue_id' => $ue->id]);

        $this->assertEquals($ue->id, $ec->ue_id);
    }

    public function testValidationCodeUE()
    {
        $response = $this->post('/ues', ['code' => 'XYZ']);
        $response->assertSessionHasErrors('code');
    }
    
    public function testValidationSemestre()
    {
        $response = $this->post('/ues', ['semestre' => 3]);
        $response->assertSessionHasErrors('semestre');
        $etudiant = Etudiant::factory()->create();
        $this->assertTrue($etudiant->semestreValide()); // Implémenter semestreValide
    }   

    public function testValidationUE()
    {
        $ue = UE::factory()->create();
        // Ajouter des notes simulant une moyenne >= 10
        $this->assertTrue($ue->estValidee()); // Implémenter une méthode estValidee
    }

    public function testCompensationEntreUEs()
    {
        $etudiant = Etudiant::factory()->create();
        // Ajouter des UEs et leurs notes
        $this->assertTrue($etudiant->aCompense()); // Implémenter une méthode aCompense
    }

    
    public function testPassageAnneeSuivante()
    {
        $etudiant = Etudiant::factory()->create(['niveau' => 'L1']);
        $etudiant->passerAnneeSuivante(); // Implémenter une méthode pour gérer le passage
        $this->assertEquals('L2', $etudiant->niveau);
    }
}
