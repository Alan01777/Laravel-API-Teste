<?php
namespace App\Services;

use App\Models\Receita;
use App\Http\Resources\ReceitaResource;
use App\Http\Requests\ReceitaRequest;
use App\Repositories\ReceitaRepository;
use Exception;

class ReceitaService
{
    protected $receitaRepository;

    public function __construct(ReceitaRepository $receitaRepository)
    {
        $this->receitaRepository = $receitaRepository;
    }

    public function index()
    {
        try {
            $receitas = $this->receitaRepository->findAll();
            return ReceitaResource::collection($receitas);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar receitas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(ReceitaRequest $request)
    {
        try {
            $data = $request->validated();
            $receita = $this->receitaRepository->create($data);
            return new ReceitaResource($receita);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $receita = $this->receitaRepository->find($id);
            return new ReceitaResource($receita);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function update(ReceitaRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $receita = $this->receitaRepository->update($id, $data);
            return new ReceitaResource($receita);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function destroy(int $id)
    {
        try {
            $this->receitaRepository->delete($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar receita',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}