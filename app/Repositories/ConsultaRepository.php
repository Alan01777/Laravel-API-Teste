<?php

namespace App\Repositories;

use App\Models\Consulta;
use App\Http\Requests\ConsultaRequest;
use App\Repositories\Contracts\RepositoryInterface;
use App\Exceptions\NullValueException;
use App\Exceptions\InvalidRequestBody;
use Exception;

class ConsultaRepository implements RepositoryInterface
{
    private $consulta;

    public function __construct(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }

    public function findAll()
    {
        $consultas = $this->consulta->with('medico', 'paciente')->paginate(10);
        if ($consultas->total() === 0) {
            throw new NullValueException('No consulta found');
        }
        return $consultas;
    }

    public function create($data)
    {
        return $this->consulta->create($data);
    }

    public function find($id)
    {
        $consulta = $this->consulta->find($id);
        if ($consulta === null) {
            throw new NullValueException('No consulta found with id: ' . $id);
        }
        return $consulta;
    }

    public function update($id, $data)
    {
        $consulta = $this->find($id);
        $consulta->update($data);
        return $consulta;
    }

    public function delete($id)
    {
        $consulta = $this->find($id);
        $consulta->delete();
    }
}

