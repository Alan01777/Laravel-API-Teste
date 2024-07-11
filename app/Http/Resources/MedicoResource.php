<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
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
            'nome' => $this->nome,
            'crm' => $this->crm,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'especialidade' => $this->especialidade,
            'consultas' => $this->consultas,
            'sexo' => $this->sexo,
            'data_nascimento' => $this->data_nascimento,
        ];
    }
}
