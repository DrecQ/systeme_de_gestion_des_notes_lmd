<?php

namespace Database\Factories;

use App\Models\UnitesEnseignement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElementsConstitutifs>
 */
class UnitesEnseignementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = UnitesEnseignement::class;

    public function definition(): array
    {
        return [
            'code' => 'UE'.$this->faker->unique()->numberBetween(01,99),
            'nom' => $this->faker->sentence(3),
            'credits_ects' => $this->faker->numberBetween(1, 30),
            'semestre' => $this->faker->numberBetween(1, 6)
        ];
    }
}
