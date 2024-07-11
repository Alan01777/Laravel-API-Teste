<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PagamentoResource;
use App\Http\Requests\PagamentoRequest;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PagamentoResource::collection(Pagamento::with('consulta')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagamentoRequest $request, Pagamento $pagamento)
    {
        $data = $request->validated();
        $pagamento = Pagamento::create($data);

        return new PagamentoResource($pagamento);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pagamento $pagamento)
    {
        return new PagamentoResource($pagamento->load('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PagamentoRequest $request, Pagamento $pagamento)
    {
        $data = $request->validated();
        $pagamento->update($data);

        return new PagamentoResource($pagamento);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();

        return response()->json(null, 204);
    }
}
