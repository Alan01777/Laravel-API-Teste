<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ConsultaRequest extends FormRequest
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
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_agendamento' => 'required|date',
            'data_consulta' => 'required|date',
            'motivo' => 'required|string',
            'observacoes' => 'nullable|string',
            'medicamentos' => 'nullable|string',
        ];
    }
}
