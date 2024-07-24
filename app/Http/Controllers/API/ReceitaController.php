<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receita;
use App\Http\Resources\ReceitaResource;
use App\Http\Requests\ReceitaRequest;

class ReceitaController extends Controller
{
    public function index()
    {
        $receitas = Receita::with('consulta')->paginate(10);
        return ReceitaResource::collection($receitas);
    }

    public function store(ReceitaRequest $request)
    {
        $data = $request->validated();
        $receita = Receita::create($data);
        return new ReceitaResource($receita);
    }

    public function show($id)
    {
        $receita = Receita::with('consulta')->find($id);
        return new ReceitaResource($receita);
    }

    public function update(ReceitaRequest $request, $id)
    {
        $data = $request->validated();
        $receita = Receita::find($id);
        $receita->update($data);
        return new ReceitaResource($receita);
    }

    public function destroy($id)
    {
        $receita = Receita::find($id);
        $receita->delete();
        return response()->json(null, 204);
    }
}
