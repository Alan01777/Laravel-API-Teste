<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use App\Services\ReceitaService;

class ReceitaController extends Controller
{
    public function index(ReceitaService $receitaService)
    {
        return $receitaService->index();
    }

   
    public function store(ReceitaRequest $request, ReceitaService $receitaService)
    {
        return $receitaService->store($request);
    }

    
    public function show(ReceitaService $receitaService, int $id)
    {
        return $receitaService->show($id);
    }

    
    public function update(ReceitaRequest $request, ReceitaService $receitaService, int $id)
    {
        return $receitaService->update($request, $id);
    }

    
    public function destroy(int $id, ReceitaService $receitaService)
    {
        return $receitaService->destroy($id);
    }
}
