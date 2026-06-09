<?php

use App\Models\User;
use App\Models\Cargo;
use Laravel\Sanctum\Sanctum;

test('listar cargos', function () {

    Sanctum::actingAs(User::first());

    $response = $this->getJson('/api/cargos');

    $response->assertStatus(200);
});

test('mostrar cargo por id', function () {

    Sanctum::actingAs(User::first());

    $cargo = Cargo::first();

    $response = $this->getJson('/api/cargos/' . $cargo->id);

    $response->assertStatus(200);
});

test('crear cargo', function () {

    Sanctum::actingAs(User::first());

    $response = $this->postJson('/api/cargos', [
        'nombre_cargo' => 'Analista',
        'descripcion' => 'Analiza procesos'
    ]);

    $response->assertStatus(201);
});

test('actualizar cargo', function () {

    Sanctum::actingAs(User::first());

    $cargo = Cargo::first();

    $response = $this->putJson('/api/cargos/' . $cargo->id, [
        'nombre_cargo' => 'Analista Senior',
        'descripcion' => 'Analiza y coordina procesos'
    ]);

    $response->assertStatus(200);
});

test('eliminar cargo', function () {

    Sanctum::actingAs(User::first());

    $cargo = Cargo::create([
        'nombre_cargo' => 'Temporal',
        'descripcion' => 'Cargo temporal'
    ]);

    $response = $this->deleteJson('/api/cargos/' . $cargo->id);

    $response->assertStatus(200);
});
