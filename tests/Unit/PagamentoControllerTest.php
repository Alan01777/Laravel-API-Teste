<?php

namespace Tests\Unit;

use App\Http\Controllers\API\PagamentoController;
use App\Http\Requests\PagamentoRequest;
use App\Services\PagamentoService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class PagamentoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_response_from_pagamento_service(): void
    {
        $pagamentoService = Mockery::mock(PagamentoService::class);
        $pagamentoService->shouldReceive('index')->once()->andReturn('response');

        $controller = new PagamentoController($pagamentoService);
        $response = $controller->index($pagamentoService);

        $this->assertEquals('response', $response);
    }

    public function test_store_method_returns_response_from_pagamento_service(): void
    {
        $request = Mockery::mock(PagamentoRequest::class);
        $pagamentoService = Mockery::mock(PagamentoService::class);
        $pagamentoService->shouldReceive('store')->once()->with($request)->andReturn('response');

        $controller = new PagamentoController($pagamentoService);
        $response = $controller->store($request, $pagamentoService);

        $this->assertEquals('response', $response);
    }

    public function test_show_method_returns_response_from_pagamento_service(): void
    {
        $id = 1;
        $pagamentoService = Mockery::mock(PagamentoService::class);
        $pagamentoService->shouldReceive('show')->once()->with($id)->andReturn('response');

        $controller = new PagamentoController($pagamentoService);
        $response = $controller->show($pagamentoService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_update_method_returns_response_from_pagamento_service(): void
    {
        $request = Mockery::mock(PagamentoRequest::class);
        $id = 1;
        $pagamentoService = Mockery::mock(PagamentoService::class);
        $pagamentoService->shouldReceive('update')->once()->with($request, $id)->andReturn('response');

        $controller = new PagamentoController($pagamentoService);
        $response = $controller->update($request, $pagamentoService, $id);

        $this->assertEquals('response', $response);
    }

    public function test_destroy_method_returns_response_from_pagamento_service(): void
    {
        $id = 1;
        $pagamentoService = Mockery::mock(PagamentoService::class);
        $pagamentoService->shouldReceive('destroy')->once()->with($id)->andReturn('response');

        $controller = new PagamentoController($pagamentoService);
        $response = $controller->destroy($id, $pagamentoService);

        $this->assertEquals('response', $response);
    }
}
