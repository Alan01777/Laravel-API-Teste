<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Services\MedicoService;

class MedicoController extends Controller
{
   
    public function index(MedicoService $medicoService)
    {
        return $medicoService->index();
    }

    
    public function store(MedicoRequest $request, MedicoService $medicoService)
    {
        return $medicoService->store($request);
    }

    
    public function show(MedicoService $medicoService, int $id)
    {
        return $medicoService->show($id);
    }
    
    public function update(MedicoService $medicoService, MedicoRequest $request, int $id)
    {
        return $medicoService->update($request, $id);
    }

    
    public function destroy(MedicoService $medicoService, int $id)
    {
        return $medicoService->destroy($id);
    }
}
