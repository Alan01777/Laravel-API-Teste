<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receita;
use App\Http\Resources\ReceitaResource;
use App\Http\Requests\ReceitaRequest;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReceitaResource::collection(Receita::with('consulta')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReceitaRequest $request, Receita $receita)
    {
        $data = $request->validated();
        $receita = Receita::create($data);

        return new ReceitaResource($receita);
    }

    /**
     * Display the specified resource.
     */
    public function show(Receita $receita)
    {
        return new ReceitaResource($receita->load('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReceitaRequest $request, Receita $receita)
    {
        $data = $request->validated();
        $receita->update($data);

        return new ReceitaResource($receita);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receita $receita)
    {
        $receita->delete();

        return response()->noContent();
    }
}
