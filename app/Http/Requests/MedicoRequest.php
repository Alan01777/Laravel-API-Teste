<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
{
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
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefone' => 'required|string|max:255',
            'crm' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string|max:1',
        ];
    }
}
