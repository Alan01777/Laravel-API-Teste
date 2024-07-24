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
        try {
            $pacientes = $this->pacienteRepository->findAll();
            return PacienteResource::collection($pacientes);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar pacientes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(PacienteRequest $request)
    {
        try {
            $data = $request->validated();
            $paciente = $this->pacienteRepository->create($data);
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $paciente = $this->pacienteRepository->find($id);
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(PacienteRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $paciente = $this->pacienteRepository->update($id, $data);
            return new PacienteResource($paciente);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $paciente = $this->pacienteRepository->delete($id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar paciente',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
