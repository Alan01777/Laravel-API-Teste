<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PagamentoResource;
use App\Http\Requests\PagamentoRequest;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamento::with('consulta')->paginate(10);
        return PagamentoResource::collection($pagamentos);
    }

    public function store(PagamentoRequest $request)
    {
        $data = $request->validated();
        $pagamento = Pagamento::create($data);
        return new PagamentoResource($pagamento);
    }

    public function show($id)
    {
        $pagamento = Pagamento::with('consulta')->find($id);
        return new PagamentoResource($pagamento);
    }

    public function update(PagamentoRequest $request, $id)
    {
        $data = $request->validated();
        $pagamento = Pagamento::find($id);
        $pagamento->update($data);
        return new PagamentoResource($pagamento);
    }

    public function destroy($id)
    {
        $pagamento = Pagamento::find($id);
        $pagamento->delete();
        return response()->json(null, 204);
    }
}
