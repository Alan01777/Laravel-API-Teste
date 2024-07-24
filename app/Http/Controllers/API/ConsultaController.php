<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ConsultaResource;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with('medico', 'paciente')->paginate(10);
        return ConsultaResource::collection($consultas);
    }

    public function store(ConsultaRequest $request)
    {
        $data = $request->validated();
        $consulta = Consulta::create($data);
        return new ConsultaResource($consulta);
    }

    public function show($id)
    {
        $consulta = Consulta::with('medico', 'paciente')->find($id);
        return new ConsultaResource($consulta);
    }

    public function update(ConsultaRequest $request, $id)
    {
        $data = $request->validated();
        $consulta = Consulta::find($id);
        $consulta->update($data);
        return new ConsultaResource($consulta);
    }

    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        $consulta->delete();
        return response()->json(null, 204);
    }
}
