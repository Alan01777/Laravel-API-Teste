<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Services\MedicoService;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MedicoService $medicoService)
    {
        return $medicoService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicoRequest $request, MedicoService $medicoService)
    {
        return $medicoService->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicoService $medicoService, int $id)
    {
        return $medicoService->show($id);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(MedicoService $medicoService, MedicoRequest $request, int $id)
    {
        return $medicoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicoService $medicoService, int $id)
    {
        return $medicoService->destroy($id);
    }
}
