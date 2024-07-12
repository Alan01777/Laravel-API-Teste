<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagamento>
 */
class PagamentoFactory extends Factory
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
            'valor' => $this->faker->randomFloat(2, 0, 1000),
            'forma_pagamento' => $this->faker->randomElement(['Dinheiro', 'Cartão de Crédito', 'Cartão de Débito']),
        ];
    }
}
