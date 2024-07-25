<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\PagamentoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Consulta;

class PagamentoRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorize_method_returns_true(): void
    {
        $request = new PagamentoRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules_method_returns_correct_validation_rules(): void
    {
        $paciente = Paciente::factory()->create();
        $medico = Medico::factory()->create();
        $consulta = Consulta::factory()->create([
            'paciente_id' => $paciente->id,
            'medico_id' => $medico->id,
        ]);


        $request = new PagamentoRequest();
        $validator = Validator::make([], $request->rules());

        $this->assertFalse($validator->passes());

        $validator = Validator::make([
            "consulta_id" => 1,
            "valor" => 200.00,
            "forma_pagamento" => "pix",
            "status" => "pendente",
            'consulta_id' => $consulta->id,
        ], $request->rules());

        $this->assertTrue($validator->passes());

        $validator = Validator::make([
            'valor' => null,
            'forma_pagamento' => null,
            'status' => null,
            'consulta_id' => null,
        ], $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertCount(4, $validator->errors());
    }
}