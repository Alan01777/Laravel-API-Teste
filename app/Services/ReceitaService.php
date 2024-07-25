<?php

namespace App\Services;

use App\Http\Resources\ReceitaResource;
use App\Http\Requests\ReceitaRequest;
use App\Repositories\ReceitaRepository;

class ReceitaService
{
    protected $receitaRepository;

    public function __construct(ReceitaRepository $receitaRepository)
    {
        $this->receitaRepository = $receitaRepository;
    }

    public function index()
    {
        $receitas = $this->receitaRepository->findAll();
        return ReceitaResource::collection($receitas);
    }

    public function store(ReceitaRequest $request)
    {
        $data = $request->validated();
        $receita = $this->receitaRepository->create($data);
        return new ReceitaResource($receita);
    }

    public function show(int $id)
    {
        $receita = $this->receitaRepository->find($id);
        return new ReceitaResource($receita);
    }
    
    public function update(ReceitaRequest $request, int $id)
    {
        $data = $request->validated();
        $receita = $this->receitaRepository->update($id, $data);
        return new ReceitaResource($receita);
    }

    public function destroy(int $id)
    {
        $this->receitaRepository->delete($id);
        return response()->json(null, 204);
    }
}