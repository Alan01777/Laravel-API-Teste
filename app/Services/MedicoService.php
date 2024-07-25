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
        $medicos = $this->medicoRepository->findAll();
        return MedicoResource::collection($medicos);
    }

    public function store(MedicoRequest $request)
    {
        $data = $request->validated();
        $medico = $this->medicoRepository->create($data);
        return new MedicoResource($medico);
    }

    public function show(int $id)
    {
        $medico = $this->medicoRepository->find($id);
        return new MedicoResource($medico);
    }

    public function update(MedicoRequest $request, int $id)
    {
        $data = $request->validated();
        $medico = $this->medicoRepository->update($id, $data);
        return new MedicoResource($medico);
    }

    public function destroy(int $id)
    {
        $this->medicoRepository->delete($id);
        return response()->json(null, 204);
    }
}
