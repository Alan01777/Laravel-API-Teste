<?php

namespace Tests\Unit;

use App\Http\Controllers\API\ReceitaController;
use App\Http\Requests\ReceitaRequest;
use App\Services\ReceitaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class ReceitaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_response_from_receita_service(): void
    {
        $receitaService = Mockery::mock(ReceitaService::class);
        $receitaService->shouldReceive('index')->once()->andReturn('response');

        $controller = new ReceitaController($receitaService);
        $response = $controller->index($receitaService);

        $this->assertEquals('response', $response);
    }

    public function test_store_method_returns_response_from_receita_service(): void
    {
        $request = Mockery::mock(ReceitaRequest::class);
        $receitaService = Mockery::mock(ReceitaService::class);
        $receitaService->shouldReceive('store')->once()->with($request)->andReturn('response');

        $controller = new ReceitaController($receitaService);
        $response = $controller->store($request, $receitaService);

        $this->assertEquals('response', $response);
    }

    public function test_show_method_returns_response_from_receita_service(): void
    {
        $id = 1;
        $receitaService = Mockery::mock(ReceitaService::class);
        $receitaService->shouldReceive('show')->once()->with($id)->andReturn('response');

        $controller = new ReceitaController($receitaService);
        $response = $controller->show($receitaService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_update_method_returns_response_from_receita_service(): void
    {
        $request = Mockery::mock(ReceitaRequest::class);
        $id = 1;
        $receitaService = Mockery::mock(ReceitaService::class);
        $receitaService->shouldReceive('update')->once()->with($request, $id)->andReturn('response');

        $controller = new ReceitaController($receitaService);
        $response = $controller->update($request, $receitaService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_destroy_method_returns_response_from_receita_service(): void
    {
        $id = 1;
        $receitaService = Mockery::mock(ReceitaService::class);
        $receitaService->shouldReceive('destroy')->once()->with($id)->andReturn('response');

        $controller = new ReceitaController($receitaService);
        $response = $controller->destroy($id, $receitaService);

        $this->assertEquals('response', $response);
    }
}