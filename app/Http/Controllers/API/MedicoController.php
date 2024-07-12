<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MedicoResource;
use App\Models\Medico;
use App\Http\Requests\MedicoRequest;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $medicos = Medico::with('consultas')->paginate(100);

            return MedicoResource::collection($medicos);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar médicos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicoRequest $request, Medico $medico)
    {
        $data = $request->validated();
        $medico = Medico::create($data);

        return new MedicoResource($medico);
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        return new MedicoResource($medico->load('consultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicoRequest $request, Medico $medico)
    {
        $data = $request->validated();
        $medico->update($data);

        return new MedicoResource($medico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return response()->json(null, 204);
    }
}
