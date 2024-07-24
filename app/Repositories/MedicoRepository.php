<?php

namespace App\Repositories;

use App\Models\Medico;
use App\Repositories\Contracts\RepositoryInterface;
use Exception;

class MedicoRepository implements RepositoryInterface
{
    private $medico;

    public function __construct(Medico $medico)
    {
        $this->medico = $medico;
    }

    public function findAll()
    {
        try {
            $medicos = $this->medico->with('consultas')->paginate(10);
            if ($medicos === null) {
                throw new Exception('No medico found');
            }
            return $medicos;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar medicos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create($data)
    {
        try {
            return $this->medico->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function find($id)
    {
        try {
            $medico = $this->medico->find($id);
            if ($medico === null) {
                throw new Exception('No medico found with id: ' . $id);
            }
            return $medico;
        } catch (Exception $e) {
            throw new Exception('Error fetching medico: ' . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $medico = $this->find($id);
            $medico->update($data);
            return $medico;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $medico = $this->find($id);
            if ($medico) {
                $medico->delete();
                return response()->json(null, 204);
            } else {
                throw new Exception('No medico found with id: ' . $id);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
