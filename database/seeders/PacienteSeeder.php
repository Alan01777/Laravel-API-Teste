<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $numeroPacientes = random_int(30, 60);
        // Paciente::factory()->count($numeroPacientes)->create();

        $pacientes = Paciente::factory()->count(20)->make();

        $chunks = $pacientes->chunk(5);

        $chunks->each(function ($chunk) {
            Paciente::insert($chunk->toArray());
        });
    }
}
