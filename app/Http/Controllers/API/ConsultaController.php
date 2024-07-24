<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultaRequest;
use App\Services\ConsultaService;

class ConsultaController extends Controller
{
    public function index(ConsultaService $consultaService)
    {
        return $consultaService->index();
    }

   
    public function store(ConsultaRequest $request, ConsultaService $consultaService)
    {
        return $consultaService->store($request);
    }

    
    public function show(ConsultaService $consultaService, int $id)
    {
        return $consultaService->show($id);
    }

    
    public function update(ConsultaRequest $request, ConsultaService $consultaService, int $id)
    {
        return $consultaService->update($request, $id);
    }

    
    public function destroy(int $id, ConsultaService $consultaService)
    {
        return $consultaService->destroy($id);
    }
}
