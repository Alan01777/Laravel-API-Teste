<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\API\MedicoController;
use App\Http\Controllers\API\ConsultaController;
use App\Http\Controllers\API\ReceitaController;
use App\Http\Controllers\API\PagamentoController;


Route::apiResource('pacientes', PacienteController::class);
Route::apiResource('medicos', MedicoController::class);
Route::apiResource('consultas', ConsultaController::class);
Route::apiResource('receitas', ReceitaController::class);
Route::apiResource('pagamentos', PagamentoController::class);
