<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicoRequest;
use App\Services\MedicoService;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param MedicoService $medicoService
     * @return \Illuminate\Http\Response
     */
    public function index(MedicoService $medicoService)
    {
        return $medicoService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MedicoRequest $request
     * @param MedicoService $medicoService
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request, MedicoService $medicoService)
    {
        return $medicoService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param MedicoService $medicoService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(MedicoService $medicoService, int $id)
    {
        return $medicoService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MedicoService $medicoService
     * @param MedicoRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoService $medicoService, MedicoRequest $request, int $id)
    {
        return $medicoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MedicoService $medicoService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicoService $medicoService, int $id)
    {
        return $medicoService->destroy($id);
    }
}
