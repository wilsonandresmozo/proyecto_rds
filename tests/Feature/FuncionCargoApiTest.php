<?php

use App\Models\User;
use App\Models\Cargo;
use App\Models\FuncionCargo;
use Laravel\Sanctum\Sanctum;

test('listar funciones cargo', function () {

    Sanctum::actingAs(User::first());

    $response = $this->getJson('/api/funciones-cargo');

    $response->assertStatus(200);
});

test('mostrar funcion cargo por id', function () {

    Sanctum::actingAs(User::first());

    $funcion = FuncionCargo::first();

    $response = $this->getJson('/api/funciones-cargo/' . $funcion->id);

    $response->assertStatus(200);
});

test('crear funcion cargo', function () {

    Sanctum::actingAs(User::first());

    $cargo = Cargo::first();

    $response = $this->postJson('/api/funciones-cargo', [
        'descripcion_funcion' => 'Nueva función de prueba',
        'estado' => 1,
        'cargo_id' => $cargo->id
    ]);

    $response->assertStatus(201);
});

test('actualizar funcion cargo', function () {

    Sanctum::actingAs(User::first());

    $funcion = FuncionCargo::first();

    $response = $this->putJson('/api/funciones-cargo/' . $funcion->id, [
        'descripcion_funcion' => 'Función actualizada',
        'estado' => 1,
        'cargo_id' => $funcion->cargo_id
    ]);

    $response->assertStatus(200);
});

test('eliminar funcion cargo', function () {

    Sanctum::actingAs(User::first());

    $cargo = Cargo::first();

    $funcion = FuncionCargo::create([
        'descripcion_funcion' => 'Temporal',
        'estado' => 1,
        'cargo_id' => $cargo->id
    ]);

    $response = $this->deleteJson('/api/funciones-cargo/' . $funcion->id);

    $response->assertStatus(200);
});
