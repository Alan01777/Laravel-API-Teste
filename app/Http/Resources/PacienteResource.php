<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        if ($request->routeIs('pacientes.index')) {
            return [
                'id' => $this->id,
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'data_nascimento' => $this->data_nascimento,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'sexo' => $this->sexo,
            ];
        } else {
            return [
                'id' => $this->id,
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'data_nascimento' => $this->data_nascimento,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'sexo' => $this->sexo,
                'consultas' => $this->consultas,
            ];
        }
    }
}
