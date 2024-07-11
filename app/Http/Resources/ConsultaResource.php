<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'data_agendamento' => $this->data_agendamento,
            'data_consulta' => $this->data_consulta,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'motivo' => $this->motivo,
            'observacoes' => $this->observacoes,
            'medico' => $this->medico,
            'paciente' => $this->paciente,
        ];
    }
}
