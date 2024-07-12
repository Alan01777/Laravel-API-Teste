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
        if ($request->routeIs('consultas.index')){
            return [
                'id' => $this->id,
                'data' => $this->data,
                'hora' => $this->hora,
                'medico' => $this->medico->nome,
                'paciente' => $this->paciente->nome,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        }else {
            return [
                'id' => $this->id,
                'data' => $this->data,
                'hora' => $this->hora,
                'medico' => $this->medico,
                'paciente' => $this->paciente,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        }
    }
}
