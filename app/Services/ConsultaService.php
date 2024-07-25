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
        $consultas = $this->consultaRepository->findAll();
        return ConsultaResource::collection($consultas);
    }

    public function store(ConsultaRequest $request)
    {
        $data = $request->validated();        
        $consulta = $this->consultaRepository->create($data);
        return new ConsultaResource($consulta);
    }

    public function show(int $id)
    {
        $consulta = $this->consultaRepository->find($id);
        return new ConsultaResource($consulta);
    }
    
    public function update(ConsultaRequest $request, int $id)
    {
        $data = $request->validated();
        $consulta = $this->consultaRepository->update($id, $data);
        return new ConsultaResource($consulta);
    }

    public function destroy(int $id)
    {
        $consulta = $this->consultaRepository->find($id);
        $consulta->delete();
        return response()->json(null, 204);
    }
}