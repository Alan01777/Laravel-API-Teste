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
     * @param  \App\Services\PagamentoService  $pagamentoService
     * @return \Illuminate\Http\Response
     */
    public function index(PagamentoService $pagamentoService)
    {
        return $pagamentoService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PagamentoRequest  $request
     * @param  \App\Services\PagamentoService  $pagamentoService
     * @return \Illuminate\Http\Response
     */
    public function store(PagamentoRequest $request, PagamentoService $pagamentoService)
    {
        return $pagamentoService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\PagamentoService  $pagamentoService
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PagamentoService $pagamentoService, int $id)
    {
        return $pagamentoService->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PagamentoRequest  $request
     * @param  \App\Services\PagamentoService  $pagamentoService
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagamentoRequest $request, PagamentoService $pagamentoService, int $id)
    {
        return $pagamentoService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Services\PagamentoService  $pagamentoService
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, PagamentoService $pagamentoService)
    {
        return $pagamentoService->destroy($id);
    }
}
