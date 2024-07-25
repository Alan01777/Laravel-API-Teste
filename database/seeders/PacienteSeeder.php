<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pacientes = Paciente::factory()->count(20)->make();

        $chunks = $pacientes->chunk(5);

        $chunks->each(function ($chunk) {
            Paciente::insert($chunk->toArray());
        });
    }
}
