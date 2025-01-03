<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testStoreNote()
    {
        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();
    
        $response = $this->post('/notes',[
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => 15,
            'session' => 'normale',
            'date_evaluation' => now()->toDateString(),
        ]);
    
        $response->assertStatus(201);
        $this->assertDatabaseHas('notes', [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => 15,
        ]);
    }

    public function testValidationNote()
    {
        $response = $this->post('/notes', ['note' => 21]);
        $response->assertSessionHasErrors('note');
    }

    public function testCalculMoyenneUE()
    {
        $ue = UE::factory()->create();
        $ec1 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 2]);
        $ec2 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 3]);
    
        Note::factory()->create(['ec_id' => $ec1->id, 'note' => 14]);
        Note::factory()->create(['ec_id' => $ec2->id, 'note' => 16]);
    
        $moyenne = $ue->calculerMoyenne(); // Implémenter une méthode calculerMoyenne dans le modèle UE
    
        $this->assertEquals(15.2, $moyenne);
    }

    public function testGestionSessions()
    {
        $note = Note::factory()->create(['session' => 'normale']);
    
        $this->assertEquals('normale', $note->session);
    }

    public function testValidationNotesManquantes()
    {
        $response = $this->post('/notes', ['note' => null]);
        $response->assertSessionHasErrors('note');
    }
}
