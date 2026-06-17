<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CargoController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\FuncionCargoController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('cargos', CargoController::class);

    Route::apiResource('empleados', EmpleadoController::class);

    Route::apiResource('funciones-cargo', FuncionCargoController::class);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

});
