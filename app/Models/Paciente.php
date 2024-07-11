<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'telefone',
        'cpf',
        'email',
        'sexo'
    ];

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}
