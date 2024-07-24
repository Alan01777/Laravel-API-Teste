<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagamentoRequest;
use App\Services\PagamentoService;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\PagamentoService  $PagamentoService
     * @return \Illuminate\Http\Response
     */
    public function index(PagamentoService $PagamentoService)
    {
        return $PagamentoService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PagamentoRequest  $request
     * @param  \App\Services\PagamentoService  $PagamentoService
     * @return \Illuminate\Http\Response
     */
    public function store(PagamentoRequest $request, PagamentoService $PagamentoService)
    {
        return $PagamentoService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\PagamentoService  $PagamentoService
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PagamentoService $PagamentoService, int $id)
    {
        return $PagamentoService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PagamentoRequest  $request
     * @param  \App\Services\PagamentoService  $PagamentoService
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagamentoRequest $request, PagamentoService $PagamentoService, int $id)
    {
        return $PagamentoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Services\PagamentoService  $PagamentoService
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, PagamentoService $PagamentoService)
    {
        return $PagamentoService->destroy($id);
    }
}
