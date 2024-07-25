<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
{
    const RULE = 'required|string|max:255';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        
        return [
            'nome' => self::RULE,
            'email' => 'required|string|email|max:255',
            'telefone' => self::RULE,
            'crm' => self::RULE,
            'especialidade' => self::RULE,
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string|max:1',
        ];
    }
}
