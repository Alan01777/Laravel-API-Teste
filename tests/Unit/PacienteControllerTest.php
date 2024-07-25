<?php

namespace Tests\Unit;

use App\Http\Controllers\API\PacienteController;
use App\Http\Requests\PacienteRequest;
use App\Services\PacienteService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class PacienteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_response_from_paciente_service(): void
    {
        $pacienteService = Mockery::mock(PacienteService::class);
        $pacienteService->shouldReceive('index')->once()->andReturn('response');

        $controller = new PacienteController($pacienteService);
        $response = $controller->index($pacienteService);

        $this->assertEquals('response', $response);
    }

    public function test_store_method_returns_response_from_paciente_service(): void
    {
        $request = Mockery::mock(PacienteRequest::class);
        $pacienteService = Mockery::mock(PacienteService::class);
        $pacienteService->shouldReceive('store')->once()->with($request)->andReturn('response');

        $controller = new PacienteController($pacienteService);
        $response = $controller->store($request, $pacienteService);

        $this->assertEquals('response', $response);
    }

    public function test_show_method_returns_response_from_paciente_service(): void
    {
        $id = 1;
        $pacienteService = Mockery::mock(PacienteService::class);
        $pacienteService->shouldReceive('show')->once()->with($id)->andReturn('response');

        $controller = new PacienteController($pacienteService);
        $response = $controller->show($pacienteService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_update_method_returns_response_from_paciente_service(): void
    {
        $request = Mockery::mock(PacienteRequest::class);
        $id = 1;
        $pacienteService = Mockery::mock(PacienteService::class);
        $pacienteService->shouldReceive('update')->once()->with($request, $id)->andReturn('response');

        $controller = new PacienteController($pacienteService);
        $response = $controller->update($request, $pacienteService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_destroy_method_returns_response_from_paciente_service(): void
    {
        $id = 1;
        $pacienteService = Mockery::mock(PacienteService::class);
        $pacienteService->shouldReceive('destroy')->once()->with($id)->andReturn('response');

        $controller = new PacienteController($pacienteService);
        $response = $controller->destroy($id, $pacienteService);

        $this->assertEquals('response', $response);
    }
}
