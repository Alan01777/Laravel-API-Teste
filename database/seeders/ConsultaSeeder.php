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
        $medicos = Medico::all();

        Paciente::chunk(5, function ($pacientes) use ($medicos) {
            $consultas = [];

            foreach ($pacientes as $paciente) {
                $medico = $medicos->random();
                $consultasPaciente = random_int(1, 3);

                for ($i = 0; $i < $consultasPaciente; $i++) {
                    $consultas[] = Consulta::factory()->make([
                        'paciente_id' => $paciente->id,
                        'medico_id' => $medico->id,
                    ])->toArray();
                }
            }

            $chunks = collect($consultas)->chunk(1000);
            $chunks->each(function ($chunk) {
                Consulta::insert($chunk->toArray());
            });
        });
    }
}
