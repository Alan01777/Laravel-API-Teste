<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Resources\PacienteResource;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PacienteResource::collection(Paciente::with('consultas')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PacienteRequest $request, Paciente $paciente)
    {
        $data = $request->validated();
        $paciente = Paciente::create($data);

        return new PacienteResource($paciente);
    }


    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        return new PacienteResource($paciente->load('consultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PacienteRequest $request, Paciente $paciente)
    {
        $data = $request->validated();
        $paciente->update($data);

        return new PacienteResource($paciente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return response()->noContent();
    }
}
