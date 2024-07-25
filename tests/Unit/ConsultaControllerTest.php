<?php

namespace Tests\Feature\API;

use App\Http\Controllers\API\ConsultaController;
use App\Http\Requests\ConsultaRequest;
use App\Services\ConsultaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class ConsultaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_response_from_consulta_service(): void
    {
        $consultaService = Mockery::mock(ConsultaService::class);
        $consultaService->shouldReceive('index')->once()->andReturn('response');

        $controller = new ConsultaController($consultaService);
        $response = $controller->index($consultaService);

        $this->assertEquals('response', $response);
    }

    public function test_store_method_returns_response_from_consulta_service(): void
    {
        $request = Mockery::mock(ConsultaRequest::class);
        $consultaService = Mockery::mock(ConsultaService::class);
        $consultaService->shouldReceive('store')->once()->with($request)->andReturn('response');

        $controller = new ConsultaController($consultaService);
        $response = $controller->store($request, $consultaService);

        $this->assertEquals('response', $response);
    }

    public function test_show_method_returns_response_from_consulta_service(): void
    {
        $id = 1;
        $consultaService = Mockery::mock(ConsultaService::class);
        $consultaService->shouldReceive('show')->once()->with($id)->andReturn('response');

        $controller = new ConsultaController($consultaService);
        $response = $controller->show($consultaService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_update_method_returns_response_from_consulta_service(): void
    {
        $request = Mockery::mock(ConsultaRequest::class);
        $id = 1;
        $consultaService = Mockery::mock(ConsultaService::class);
        $consultaService->shouldReceive('update')->once()->with($request, $id)->andReturn('response');

        $controller = new ConsultaController($consultaService);
        $response = $controller->update($request, $consultaService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_destroy_method_returns_response_from_consulta_service(): void
    {
        $id = 1;
        $consultaService = Mockery::mock(ConsultaService::class);
        $consultaService->shouldReceive('destroy')->once()->with($id)->andReturn('response');

        $controller = new ConsultaController($consultaService);
        $response = $controller->destroy($id, $consultaService);

        $this->assertEquals('response', $response);
    }
}
