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
        $consultas = Consulta::all();

        foreach ($consultas as $consulta) {
            $pago = random_int(0, 1);
            $pago = $pago == 1 ? 'pago' : 'pendente';
            Pagamento::factory()->create([
                'consulta_id' => $consulta->id,
                'status' => $pago
            ]);
        }
    }
}
