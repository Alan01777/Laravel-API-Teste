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
       Consulta::chunk(5, function ($consultas) {
            $receitas = [];

            foreach($consultas as $consulta){
                $receitas[] = Receita::factory()->make([
                    'consulta_id' => $consulta->id
                ])->toArray();
            }

            $chunks = collect($receitas)->chunk(1000);
            $chunks->each(function ($chunk) {
                Receita::insert($chunk->toArray());
            });
       });


    }
}
