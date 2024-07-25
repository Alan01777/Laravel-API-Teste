<?php

namespace App\Repositories;

use App\Exceptions\NullValueException;
use App\Models\Receita;
use App\Repositories\Contracts\RepositoryInterface;
use Exception;

class ReceitaRepository implements RepositoryInterface
{
    private $receita;

    public function __construct(Receita $receita)
    {
        $this->receita = $receita;
    }

    public function findAll()
    {
        $receitas = $this->receita->with('consulta')->paginate(10);
        if ($receitas === null) {
            throw new NullValueException('No recipe found');
        }
        return $receitas;
    }

    public function create($data)
    {
        return $this->receita->create($data);
    }

    public function find(int $id)
    {
        $receita = $this->receita->find($id);
        if ($receita === null) {
            throw new NullValueException('No recipe found with id: ' . $id);
        }
        return $receita;
    }

    public function update($id, $data)
    {
        $receita = $this->find($id);
        $receita->update($data);
        return $receita;
    }

    public function delete($id)
    {
        $receita = $this->find($id);
        $receita->delete();
    }
}
