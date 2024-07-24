<?php
namespace App\Repositories;

use App\Models\Consulta;
use App\Repositories\Contracts\RepositoryInterface;
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
        try {
            return $this->consulta->with('medico', 'paciente')->paginate(10);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar consultas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create($data)
    {
        try {
            return $this->consulta->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function find($id)
    {
        try {
            $consulta = $this->consulta->find($id);
            if ($consulta === null) {
                throw new Exception('No consulta found with id: ' . $id);
            }
            return $consulta;
        } catch (Exception $e) {
            throw new Exception('Error fetching consulta: ' . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $consulta = $this->find($id);
            $consulta->update($data);
            return $consulta;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $consulta = $this->find($id);
            $consulta->delete();
            return $consulta;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}