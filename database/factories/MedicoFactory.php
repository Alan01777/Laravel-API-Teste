<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => $this->faker->phoneNumber,
            'crm' => $this->faker->numerify('##########'),
            'especialidade' => $this->faker->word,
            'data_nascimento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
