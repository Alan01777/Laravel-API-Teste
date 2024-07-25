<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\ConsultaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use App\Models\Medico;
use App\Models\Paciente;

class ConsultaRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorize_method_returns_true(): void
    {
        $request = new ConsultaRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules_method_returns_correct_validation_rules(): void
    {
        // Create a Medico and Paciente record in the test database
        $medico = Medico::factory()->create();
        $paciente = Paciente::factory()->create();

        $request = new ConsultaRequest();
        $validator = Validator::make([], $request->rules());

        $this->assertFalse($validator->passes());

        $validator = Validator::make([
            'medico_id'=> $medico->id,
            'paciente_id'=> $paciente->id,
            'data_agendamento'=> '2022-12-01T14:30:00',
            'data_consulta'=> '2022-12-01T15:00:00',
            'motivo'=> 'Routine check-up',
            'observacoes'=> 'Patient has a history of hypertension',
            'medicamentos'=> 'Lisinopril 10mg daily'
        ], $request->rules());
        
        $this->assertTrue($validator->passes());

        $validator = Validator::make([
            'paciente_id' => null,
            'data' => null,
            'hora' => null,
            'tipo' => null,
            'status' => null,
        ], $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertCount(5, $validator->errors());
    }
}