<?php

namespace App\Services;

use App\Http\Resources\MedicoResource;
use App\Http\Requests\MedicoRequest;
use App\Repositories\MedicoRepository;

class MedicoService
{
    protected $medicoRepository;

    public function __construct(MedicoRepository $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }

    public function index()
    {
        try {
            $medicos = $this->medicoRepository->findAll();
            return MedicoResource::collection($medicos);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar medicos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(MedicoRequest $request)
    {
        try {
            $data = $request->validated();
            $medico = $this->medicoRepository->create($data);
            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $medico = $this->medicoRepository->find($id);
            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function update(MedicoRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $medico = $this->medicoRepository->update($id, $data);
            return new MedicoResource($medico);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->medicoRepository->delete($id);
            return response()->json([
                'message' => 'Medico deletado com sucesso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar medico',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}