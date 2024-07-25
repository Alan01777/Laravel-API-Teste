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
        $pagamentos = $this->pagamentoRepository->findAll();
        return PagamentoResource::collection($pagamentos);
    }

    public function store(PagamentoRequest $request)
    {
        $data = $request->validated();
        $pagamento = $this->pagamentoRepository->create($data);
        return new PagamentoResource($pagamento);
    }

    public function show(int $id)
    {
        $pagamento = $this->pagamentoRepository->find($id);
        return new PagamentoResource($pagamento);
    }
    
    public function update(PagamentoRequest $request, int $id)
    {
        $data = $request->validated();
        $pagamento = $this->pagamentoRepository->update($id, $data);
        return new PagamentoResource($pagamento);
    }

    public function destroy(int $id)
    {
        $this->pagamentoRepository->delete($id);
        return response()->json(null, 204);
    }
}
