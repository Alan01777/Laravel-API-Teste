<?php

namespace App\Repositories;

use App\Models\Paciente;
use App\Repositories\Contracts\RepositoryInterface;
use Exception;

class PacienteRepository implements RepositoryInterface
{
    private $paciente;

    public function __construct(Paciente $paciente)
    {
        $this->paciente = $paciente;
    }
    
    public function findAll()
    {
        try {
            return $this->paciente->with('consultas')->paginate(10);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar pacientes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create($data)
    {
        try {
            return $this->paciente->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function find(int $id)
    {
        try {
            $paciente = $this->paciente->find($id);
            if ($paciente === null) {
                throw new Exception('No patient found with id: ' . $id);
            }
            return $paciente;
        } catch (Exception $e) {
            throw new Exception('Error fetching patient: ' . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $paciente = $this->find($id);
            $paciente->update($data);
            return $paciente;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $paciente = $this->find($id);
            if ($paciente) {
                // Delete the consultas records that reference this paciente
                $paciente->consultas()->delete();
                // Now delete the paciente
                return $paciente->delete();
            }
            return null;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
