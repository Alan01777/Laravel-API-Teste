<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Medico;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        foreach ($pacientes as $paciente) {
                $medico = $medicos->random();
                $consultasPaciente = random_int(0, 3);
                Consulta::factory()->count($consultasPaciente)->create([
                    'paciente_id' => $paciente->id,
                    'medico_id' => $medico->id,
                ]);
        }
    }
}
