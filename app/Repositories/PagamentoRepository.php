<?php
namespace App\Repositories;

use App\Models\Pagamento;
use App\Repositories\Contracts\RepositoryInterface;
use Exception;

class PagamentoRepository implements RepositoryInterface
{
    private $pagamento;

    public function __construct(Pagamento $pagamento)
    {
        $this->pagamento = $pagamento;
    }
    
    public function findAll()
    {
        try {
            return $this->pagamento->with('consulta')->paginate(10);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar pagamentos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create($data)
    {
        try {
            return $this->pagamento->create($data);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function find(int $id)
    {
        try {
            $pagamento = $this->pagamento->find($id);
            if ($pagamento === null) {
                throw new Exception('No payment found with id: ' . $id);
            }
            return $pagamento;
        } catch (Exception $e) {
            throw new Exception('Error fetching payment: ' . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            $pagamento = $this->find($id);
            $pagamento->update($data);
            return $pagamento;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $pagamento = $this->find($id);
            $pagamento->delete();
            return response()->json([
                'message' => 'Pagamento deletado com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}