<?php
namespace App\Services;

use App\Http\Resources\PagamentoResource;
use App\Http\Requests\PagamentoRequest;
use App\Repositories\PagamentoRepository;

class PagamentoService
{
    protected $pagamentoRepository;

    public function __construct(PagamentoRepository $pagamentoRepository)
    {
        $this->pagamentoRepository = $pagamentoRepository;
    }

    public function index()
    {
        try {
            $pagamentos = $this->pagamentoRepository->findAll();
            return PagamentoResource::collection($pagamentos);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar pagamentos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(PagamentoRequest $request)
    {
        try {
            $data = $request->validated();
            $pagamento = $this->pagamentoRepository->create($data);
            return new PagamentoResource($pagamento);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $pagamento = $this->pagamentoRepository->find($id);
            return new PagamentoResource($pagamento);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function update(PagamentoRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $pagamento = $this->pagamentoRepository->update($id, $data);
            return new PagamentoResource($pagamento);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function destroy(int $id)
    {
        try {
            $this->pagamentoRepository->delete($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar pagamento',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}