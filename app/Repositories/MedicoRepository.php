<?php

namespace App\Repositories;

use App\Models\Medico;
use App\Repositories\Contracts\RepositoryInterface;
use App\Exceptions\NullValueException;

class MedicoRepository implements RepositoryInterface
{
    private $medico;

    public function __construct(Medico $medico)
    {
        $this->medico = $medico;
    }

    public function findAll()
    {
        $medicos = $this->medico->with('consultas')->paginate(10);
        if ($medicos->total() === 0) {
            throw new NullValueException('No medico found');
        }
        return $medicos;
    }

    public function create($data)
    {
        return $this->medico->create($data);
    }

    public function find($id)
    {
        $medico = $this->medico->find($id);
        if ($medico === null) {
            throw new NullValueException('No medico found with id: ' . $id);
        }
        return $medico;
    }

    public function update($id, $data)
    {
        $medico = $this->find($id);
        $medico->update($data);
        return $medico;
    }

    public function delete($id)
    {
        $medico = $this->find($id);
        $medico->delete();
    }
}
