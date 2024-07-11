<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Receita;
use App\Models\Consulta;

class ReceitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consultas = Consulta::all();

        foreach ($consultas as $consulta) {
            Receita::factory()->create([
                'consulta_id' => $consulta->id
            ]);
        }
    }
}
