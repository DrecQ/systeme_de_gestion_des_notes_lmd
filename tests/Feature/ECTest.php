<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ECTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreationECWithCoefficient()
    {
        $ue = UE::factory()->create();
    
        $response = $this->post('/ecs', [
            'nom' => 'Algorithmique',
            'coefficient' => 3,
            'ue_id' => $ue->id,
        ]);
    
        $response->assertStatus(201);
        $this->assertDatabaseHas('ecs', ['nom' => 'Algorithmique', 'coefficient' => 3]);
    }

    public function testECIsAttachedToUE()
    {
        $ue = UE::factory()->create();
        $ec = EC::factory()->create(['ue_id' => $ue->id]);
    
        $this->assertEquals($ue->id, $ec->ue_id);
    }

    public function testModificationEC()
    {
        $ec = EC::factory()->create();
    
        $response = $this->put("/ecs/{$ec->id}", ['nom' => 'Mathématiques']);
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('ecs', ['id' => $ec->id, 'nom' => 'Mathématiques']);
    }

    public function testValidationCoefficient()
    {
        $response = $this->post('/ecs', ['coefficient' => 6]);
        $response->assertSessionHasErrors('coefficient');
    }

    public function testSuppressionEC()
    {
        $ec = EC::factory()->create();
    
        $response = $this->delete("/ecs/{$ec->id}");
        $response->assertStatus(200);
    
        $this->assertDatabaseMissing('ecs', ['id' => $ec->id]);
    }

    public function testCalculECTS()
    {
        $etudiant = Etudiant::factory()->create();
        // Simuler des UEs validées
        $this->assertEquals(30, $etudiant->calculECTS());
    }
}
