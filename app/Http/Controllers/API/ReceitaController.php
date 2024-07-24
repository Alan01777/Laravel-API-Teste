<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use App\Services\ReceitaService;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ReceitaService $receitaService
     * @return \Illuminate\Http\Response
     */
    public function index(ReceitaService $receitaService)
    {
        return $receitaService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReceitaRequest $request
     * @param ReceitaService $receitaService
     * @return \Illuminate\Http\Response
     */
    public function store(ReceitaRequest $request, ReceitaService $receitaService)
    {
        return $receitaService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param ReceitaService $receitaService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ReceitaService $receitaService, int $id)
    {
        return $receitaService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReceitaRequest $request
     * @param ReceitaService $receitaService
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReceitaRequest $request, ReceitaService $receitaService, int $id)
    {
        return $receitaService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ReceitaService $receitaService
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, ReceitaService $receitaService)
    {
        return $receitaService->destroy($id);
    }
}
