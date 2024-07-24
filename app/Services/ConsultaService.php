<?php
namespace App\Services;

use App\Http\Resources\ConsultaResource;
use App\Http\Requests\ConsultaRequest;
use App\Repositories\ConsultaRepository;


class ConsultaService
{
    protected $consultaRepository;

    public function __construct(ConsultaRepository $consultaRepository)
    {
        $this->consultaRepository = $consultaRepository;
    }

    public function index()
    {
        try {
            $consultas = $this->consultaRepository->findAll();
            return ConsultaResource::collection($consultas);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar consultas',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(ConsultaRequest $request)
    {
        try {
            $data = $request->validated();
            $consulta = $this->consultaRepository->create($data);
            return new ConsultaResource($consulta);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $consulta = $this->consultaRepository->find($id);
            return new ConsultaResource($consulta);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function update(ConsultaRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $consulta = $this->consultaRepository->update($id, $data);
            return new ConsultaResource($consulta);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $consulta = $this->consultaRepository->find($id);
            $consulta->delete();
            return response()->json([
                'message' => 'Consulta deletada com sucesso'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao deletar consulta',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}