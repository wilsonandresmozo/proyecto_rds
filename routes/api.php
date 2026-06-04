<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CargoController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\FuncionCargoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/cargos', [CargoController::class, 'index']);


Route::get('/empleados', [EmpleadoController::class, 'index']);

Route::get('/funciones-cargo', [FuncionCargoController::class, 'index']);