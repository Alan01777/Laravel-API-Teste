<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Consulta;
use App\Models\Pagamento;

class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consulta::chunk(5, function ($consultas) {
            $pagamentos = [];

            foreach ($consultas as $consulta) {
                $pago = random_int(0, 1) == 1 ? 'pago' : 'pendente';
                $pagamentos[] = Pagamento::factory()->make([
                    'consulta_id' => $consulta->id,
                    'status' => $pago
                ])->toArray();
            }

            $chunks = collect($pagamentos)->chunk(1000);
            $chunks->each(function ($chunk) {
                Pagamento::insert($chunk->toArray());
            });
        });
    }
}
