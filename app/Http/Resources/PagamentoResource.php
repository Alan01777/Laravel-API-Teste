<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($request->routeIs('pagamentos.index')) {
            return [
                'id' => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'valor' => $this->valor,
                'forma_pagamento' => $this->forma_pagamento,
                'status' => $this->status,
                'consulta_id' => $this->consulta->id,
            ];
        } else {
            return [
                'id' => $this->id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'valor' => $this->valor,
                'forma_pagamento' => $this->forma_pagamento,
                'status' => $this->status,
                'consulta' => $this->consulta,
            ];
        }
    }
}
