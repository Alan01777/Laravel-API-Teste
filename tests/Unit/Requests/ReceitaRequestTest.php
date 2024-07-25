<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\ReceitaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Tests\TestCase;

class ReceitaRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorize_method_returns_true(): void
    {
        $request = new ReceitaRequest();

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

        $request = new ReceitaRequest();
        $validator = Validator::make([], $request->rules());

        $this->assertFalse($validator->passes());

        $validator = Validator::make([
            'consulta_id' => $consulta->id,
            'data' => '2022-01-01',
            'descricao' => 'Lorem ipsum',
            'medicamentos' => 'Lorem ipsum',
        ], $request->rules());

        $this->assertTrue($validator->passes());

        $validator = Validator::make([
            'consulta_id' => null,
            'data' => null,
            'descricao' => null,
            'medicamentos' => null,
        ], $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertCount(4, $validator->errors());
    }
}