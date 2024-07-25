<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\PacienteRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PacienteRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorize_method_returns_true(): void
    {
        $request = new PacienteRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules_method_returns_correct_validation_rules(): void
    {
        $request = new PacienteRequest();
        $validator = Validator::make([], $request->rules());

        $this->assertFalse($validator->passes());

        $validator = Validator::make([
            'nome' => 'John Doe',
            'email' => 'john.doe@example.com',
            'telefone' => '1234567890',
            'cpf' => '123.456.789-00',
            'data_nascimento' => '1980-01-01',
            'sexo' => 'M'
        ], $request->rules());

        $this->assertTrue($validator->passes());

        $validator = Validator::make([
            'nome' => null,
            'cpf' => null,
            'data_nascimento' => null,
            'telefone' => null,
            'email' => null,
            'sexo' => null,
        ], $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertCount(6, $validator->errors());
    }
}