<?php
namespace App\Repositories;

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
        try {
            return $this->receita->with('consulta')->paginate(10);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar receitas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create($data)
    {
        try {
            return $this->receita->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function find(int $id)
    {
        try {
            $receita = $this->receita->find($id);
            if ($receita === null) {
                throw new Exception('No recipe found with id: ' . $id);
            }
            return $receita;
        } catch (Exception $e) {
            throw new Exception('Error fetching recipe: ' . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $receita = $this->find($id);
            $receita->update($data);
            return $receita;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $receita = $this->find($id);
            $receita->delete();
            return response()->json([
                'message' => 'Receita deletada com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}