<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $numeroMedicos = random_int(5, 10);
        // Medico::factory()->count($numeroMedicos)->create();

        $medicos = Medico::factory()->count(10)->make();

        $chunks = $medicos->chunk(5);

        $chunks->each(function ($chunk) {
            Medico::insert($chunk->toArray());
        });
    }
}
