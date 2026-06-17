<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use App\Models\Empleado;

test('listar empleados', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $response = $this->getJson('/api/empleados');

    $response->assertStatus(200);
});

test('mostrar empleado por id', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $empleado = Empleado::first();

$response = $this->getJson('/api/empleados/' . $empleado->id);

    $response->assertStatus(200);
});

test('crear empleado', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $response = $this->postJson('/api/empleados', [
        'nombres' => 'Pedro',
        'apellidos' => 'Gomez',
        'fecha_nacimiento' => '1998-01-01',
        'fecha_ingreso' => '2026-06-05',
        'salario' => 2000000,
        'estado' => 1,
        'cargo_id' => 1
    ]);

    $response->assertStatus(201);
});

test('actualizar empleado', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $empleado = Empleado::first();

    $response = $this->putJson('/api/empleados/' . $empleado->id, [
        'nombres' => 'Pedro Andres',
        'apellidos' => 'Gomez',
        'fecha_nacimiento' => '1998-01-01',
        'fecha_ingreso' => '2026-06-05',
        'salario' => 2500000,
        'estado' => 1,
        'cargo_id' => 1
    ]);

    $response->assertStatus(200);
});

test('eliminar empleado', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $empleado = Empleado::create([
        'nombres' => 'Temporal',
        'apellidos' => 'Prueba',
        'fecha_nacimiento' => '2000-01-01',
        'fecha_ingreso' => '2026-06-05',
        'salario' => 1000000,
        'estado' => 1,
        'cargo_id' => 1
    ]);

    $response = $this->deleteJson('/api/empleados/' . $empleado->id);

    $response->assertStatus(200);
});
