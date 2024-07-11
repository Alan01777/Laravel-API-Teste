<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ConsultaResource;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ConsultaResource::collection(Consulta::with('medico', 'paciente')->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultaRequest $request, Consulta $consulta)
    {
        $data = $request->validated();
        $consulta = Consulta::create($data);

        return new ConsultaResource($consulta);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        return new ConsultaResource($consulta->load('medico', 'paciente'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultaRequest $request, Consulta $consulta)
    {
        $data = $request->validated();
        $consulta->update($data);

        return new ConsultaResource($consulta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return response()->json(null, 204);
    }
}
