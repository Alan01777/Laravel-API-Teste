<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
            'nome' => $this->faker->name,
            'data_nascimento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'telefone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'cpf' => $this->faker->numerify('###.###.###-##'),
        ];
    }
}
