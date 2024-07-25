<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\MedicoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class MedicoRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_authorize_method_returns_true(): void
    {
        $request = new MedicoRequest();

        $this->assertTrue($request->authorize());
    }

    public function test_rules_method_returns_correct_validation_rules(): void
    {
        $request = new MedicoRequest();
        $validator = Validator::make([], $request->rules());

        $this->assertFalse($validator->passes());

        $validator = Validator::make([
            'nome' => 'Dr. John Doe II',
            'email' => 'dr.john.doe@example.com',
            'telefone' => '1234567890',
            'crm' => '12345',
            'especialidade' => 'Cardiology',
            'data_nascimento' => '1980-01-01',
            "sexo" => "M"
        ], $request->rules());

        $this->assertTrue($validator->passes());

        $validator = Validator::make([
            'nome' => null,
            'email' => null,
            'telefone' => null,
            'crm' => null,
            'especialidade' => null,
            'data_nascimento' => null,
            'sexo' => null,
        ], $request->rules());

        $this->assertFalse($validator->passes());
        $this->assertCount(7, $validator->errors());
    }
}