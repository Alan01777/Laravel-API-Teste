<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteRequest;
use App\Services\PacienteService;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  PacienteService  $pacienteService
     * @return \Illuminate\Http\Response
     */
    public function index(PacienteService $pacienteService)
    {
        return $pacienteService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PacienteRequest  $request
     * @param  PacienteService  $pacienteService
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteRequest $request, PacienteService $pacienteService)
    {
        return $pacienteService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  PacienteService  $pacienteService
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PacienteService $pacienteService, int $id)
    {
        return $pacienteService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PacienteRequest  $request
     * @param  PacienteService  $pacienteService
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteRequest $request, PacienteService $pacienteService, int $id)
    {
        return $pacienteService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  PacienteService  $pacienteService
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, PacienteService $pacienteService)
    {
        return $pacienteService->destroy($id);
    }
}
