<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteTest extends TestCase
{
   use RefreshDatabase;
   
   public function test_ajout_note_valide()
   {
       $etudiant = Etudiant::factory()->create();
       $ec = EC::factory()->create();
   
       $response = $this->post(route('notes.store'), [
           'etudiant_id' => $etudiant->id,
           'ec_id' => $ec->id,
           'note' => 15,
           'session' => 'normale',
       ]);
   
       $response->assertRedirect(route('notes.create')); // Vérifie la redirection
       $this->assertDatabaseHas('notes', [
           'etudiant_id' => $etudiant->id,
           'ec_id' => $ec->id,
           'note' => 15,
           'session' => 'normale',
       ]);
   }

   public function test_note_hors_limites()
    {
        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();

        // Note inférieure à 0
        $response = $this->post(route('notes.store'), [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => -1,
            'session' => 'normale',
        ]);
        $response->assertSessionHasErrors('note');

        // Note supérieure à 20
        $response = $this->post(route('notes.store'), [
            'etudiant_id' => $etudiant->id,
            'ec_id' => $ec->id,
            'note' => 21,
            'session' => 'normale',
        ]);
        $response->assertSessionHasErrors('note');
    }

    public function test_gestion_des_sessions()
    {
        $etudiant = Etudiant::factory()->create();
        $ec = EC::factory()->create();

        // Note en session normale
        Note::factory()->create([
            'ec_id' => $ec->id,
            'etudiant_id' => $etudiant->id,
            'note' => 8,
            'session' => 'normale',
        ]);

        // Note en session de rattrapage
        Note::factory()->create([
            'ec_id' => $ec->id,
            'etudiant_id' => $etudiant->id,
            'note' => 12,
            'session' => 'rattrapage',
        ]);

        $noteRattrapage = Note::where('session', 'rattrapage')->where('etudiant_id', $etudiant->id)->first();
        $this->assertEquals(12, $noteRattrapage->note);
    }

    public function test_calcul_moyenne_ue()
    {
        $ue = UE::factory()->create();
        $etudiant = Etudiant::factory()->create();

        $ec1 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 2]);
        $ec2 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 3]);

        Note::factory()->create(['ec_id' => $ec1->id, 'etudiant_id' => $etudiant->id, 'note' => 12]);
        Note::factory()->create(['ec_id' => $ec2->id, 'etudiant_id' => $etudiant->id, 'note' => 16]);

        $moyenne = $ue->calculerMoyenne($etudiant->id);

        $this->assertEquals(14.4, $moyenne); // (12*2 + 16*3) / (2+3) = 14.4
    }

    public function test_validation_notes_manquantes()
    {
        $ue = UE::factory()->create();
        $etudiant = Etudiant::factory()->create();

        $ec1 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 2]);
        $ec2 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 3]);

        // Une seule note présente
        Note::factory()->create(['ec_id' => $ec1->id, 'etudiant_id' => $etudiant->id, 'note' => 10]);

        $moyenne = $ue->calculerMoyenne($etudiant->id);

        // La moyenne ne peut pas être calculée (car il manque une note)
        $this->assertNull($moyenne);
    }
}
