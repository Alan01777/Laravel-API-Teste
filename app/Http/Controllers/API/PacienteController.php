<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteRequest;
use App\Services\PacienteService;

class PacienteController extends Controller
{
    
    public function index(PacienteService $pacienteService)
    {
        return $pacienteService->index();
    }

   
    public function store(PacienteRequest $request, PacienteService $pacienteService)
    {
        return $pacienteService->store($request);
    }

    
    public function show(PacienteService $pacienteService, int $id)
    {
        return $pacienteService->show($id);
    }

    
    public function update(PacienteRequest $request, PacienteService $pacienteService, int $id)
    {
        return $pacienteService->update($request, $id);
    }

    
    public function destroy(int $id, PacienteService $pacienteService)
    {
        return $pacienteService->destroy($id);
    }
}
