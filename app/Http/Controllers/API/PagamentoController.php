<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagamentoRequest;
use App\Services\PagamentoService;

class PagamentoController extends Controller
{
    public function index(PagamentoService $PagamentoService)
    {
        return $PagamentoService->index();
    }

   
    public function store(PagamentoRequest $request, PagamentoService $PagamentoService)
    {
        return $PagamentoService->store($request);
    }

    
    public function show(PagamentoService $PagamentoService, int $id)
    {
        return $PagamentoService->show($id);
    }

    
    public function update(PagamentoRequest $request, PagamentoService $PagamentoService, int $id)
    {
        return $PagamentoService->update($request, $id);
    }

    
    public function destroy(int $id, PagamentoService $PagamentoService)
    {
        return $PagamentoService->destroy($id);
    }
}
