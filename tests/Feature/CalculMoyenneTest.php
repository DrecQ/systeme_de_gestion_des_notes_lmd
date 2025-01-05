<?php

namespace Tests\Feature;

use App\Models\UnitesEnseignement;
use App\Models\ElementsConstitutifs;
use App\Models\Etudiant;
use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculMoyenneTest extends TestCase
{
    use RefreshDatabase;
    public function test_calcul_moyenne()
    {
        $ue = UE::factory()->create();
        $etudiant = Etudiant::factory()->create();
    
        $ec1 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 2]);
        $ec2 = EC::factory()->create(['ue_id' => $ue->id, 'coefficient' => 3]);
    
        Note::factory()->create(['ec_id' => $ec1->id, 'etudiant_id' => $etudiant->id, 'note' => 12]);
        Note::factory()->create(['ec_id' => $ec2->id, 'etudiant_id' => $etudiant->id, 'note' => 14]);
    
        $moyenne = $ue->calculerMoyenne($etudiant->id);
    
        $this->assertEquals(13.2, $moyenne);
    }
}
