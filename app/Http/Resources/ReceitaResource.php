<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceitaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($request->routeIs('receitas.index')) {
            return [
                'id' => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'data' => $this->data,
                'descricao' => $this->descricao,
                'medicamentos' => $this->medicamentos,
                'consulta_id' => $this->consulta_id,
            ];
        } else {
            return [
                'id' => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'data' => $this->data,
                'descricao' => $this->descricao,
                'medicamentos' => $this->medicamentos,
                'consulta' => $this->consulta,
            ];
        }
    }
}
