<?php

namespace App\Services;

use App\Http\Resources\PacienteResource;
use App\Http\Requests\PacienteRequest;
use App\Repositories\PacienteRepository;

class PacienteService
{
    protected $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepository)
    {
        $this->pacienteRepository = $pacienteRepository;
    }

    public function index()
    {
        $pacientes = $this->pacienteRepository->findAll();
        return PacienteResource::collection($pacientes);
    }

    public function store(PacienteRequest $request)
    {
        $data = $request->validated();
        $paciente = $this->pacienteRepository->create($data);
        return new PacienteResource($paciente);
    }

    public function show(int $id)
    {
        $paciente = $this->pacienteRepository->find($id);
        return new PacienteResource($paciente);
    }

    public function update(PacienteRequest $request, int $id)
    {
        $data = $request->validated();
        $paciente = $this->pacienteRepository->update($id, $data);
        return new PacienteResource($paciente);
    }

    public function destroy(int $id)
    {
        $this->pacienteRepository->delete($id);
        return response()->json(null, 204);
    }
}
