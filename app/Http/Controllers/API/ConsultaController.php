<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultaRequest;
use App\Services\ConsultaService;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ConsultaService $consultaService
     * @return \Illuminate\Http\Response
     */
    public function index(ConsultaService $consultaService)
    {
        return $consultaService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ConsultaRequest $request
     * @param ConsultaService $consultaService
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultaRequest $request, ConsultaService $consultaService)
    {
        return $consultaService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param ConsultaService $consultaService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultaService $consultaService, int $id)
    {
        return $consultaService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ConsultaRequest $request
     * @param ConsultaService $consultaService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultaRequest $request, ConsultaService $consultaService, int $id)
    {
        return $consultaService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ConsultaService $consultaService
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, ConsultaService $consultaService)
    {
        return $consultaService->destroy($id);
    }
}
