<?php

namespace Database\Factories;

use App\Models\UnitesEnseignement;
use App\Models\ElementsConstitutifs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElementsConstitutifs>
 */
class ElementsConstitutifsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ElementsConstitutifs::class;

    public function definition(): array
    {
        return [
            'code' => 'UE'.$this->faker->unique()->numberBetween(01,99),
            'nom' => $this->faker->sentence(3),
            'coefficient' => $this->faker->numberBetween(1, 5),
            'ue_id' => UnitesEnseignement::factory()
        ];
    }
}
