<?php

namespace App\Repositories;

use App\Models\Paciente;
use App\Exceptions\NullValueException;
use \Exception;

class PacienteRepository
{
    protected $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }

    public function findAll()
    {
        $pacientes = $this->paciente->paginate(15);
        if ($pacientes->total() === 0) {
            throw new NullValueException('No paciente found');
        }
        return $pacientes;
    }

    public function create(array $data)
    {
        return $this->paciente->create($data);
    }

    public function find(int $id)
    {
        $paciente = $this->paciente->find($id);
        if ($paciente === null) {
            throw new NullValueException('No patient found with id: ' . $id);
        }
        return $paciente;
    }

    public function update(int $id, array $data)
    {
        $paciente = $this->find($id);
        $paciente->update($data);
        return $paciente;
    }

    public function delete(int $id)
    {
        $paciente = $this->find($id);
        $paciente->delete();
    }
}
