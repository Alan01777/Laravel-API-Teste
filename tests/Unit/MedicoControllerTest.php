<?php

namespace Tests\Unit;

use App\Http\Controllers\API\MedicoController;
use App\Http\Requests\MedicoRequest;
use App\Services\MedicoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class MedicoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_response_from_medico_service(): void
    {
        $medicoService = Mockery::mock(MedicoService::class);
        $medicoService->shouldReceive('index')->once()->andReturn('response');

        $controller = new MedicoController($medicoService);
        $response = $controller->index($medicoService);

        $this->assertEquals('response', $response);
    }

    public function test_store_method_returns_response_from_medico_service(): void
    {
        $request = Mockery::mock(MedicoRequest::class);
        $medicoService = Mockery::mock(MedicoService::class);
        $medicoService->shouldReceive('store')->once()->with($request)->andReturn('response');

        $controller = new MedicoController($medicoService);
        $response = $controller->store($request, $medicoService);

        $this->assertEquals('response', $response);
    }

    public function test_show_method_returns_response_from_medico_service(): void
    {
        $id = 1;
        $medicoService = Mockery::mock(MedicoService::class);
        $medicoService->shouldReceive('show')->once()->with($id)->andReturn('response');

        $controller = new MedicoController($medicoService);
        $response = $controller->show($medicoService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_update_method_returns_response_from_medico_service(): void
    {
        $request = Mockery::mock(MedicoRequest::class);
        $id = 1;
        $medicoService = Mockery::mock(MedicoService::class);
        $medicoService->shouldReceive('update')->once()->with($request, $id)->andReturn('response');

        $controller = new MedicoController($medicoService);
        $response = $controller->update($medicoService, $request, $id);

        $this->assertEquals('response', $response);
    }

    public function test_destroy_method_returns_response_from_medico_service(): void
    {
        $id = 1;
        $medicoService = Mockery::mock(MedicoService::class);
        $medicoService->shouldReceive('destroy')->once()->with($id)->andReturn('response');

        $controller = new MedicoController($medicoService);
        $response = $controller->destroy($medicoService, $id);

        $this->assertEquals('response', $response);
    }
}