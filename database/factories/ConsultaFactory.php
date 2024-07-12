<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
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
            'data_agendamento' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'data_consulta' => $this->faker->dateTimeBetween('now', '+1 month'),
            'motivo' => $this->faker->sentence,
            'observacoes' => $this->faker->sentence,
            'medicamentos' => $this->faker->sentence,
        ];
    }
}
