<?php

test('listar empleados', function () {

    $response = $this->getJson('/api/empleados');

    $response->assertStatus(200);
});

test('mostrar empleado por id', function () {

    $response = $this->getJson('/api/empleados/1');

    $response->assertStatus(200);
});

test('crear empleado', function () {

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

    $response = $this->putJson('/api/empleados/4', [
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

    $response = $this->deleteJson('/api/empleados/4');

    $response->assertStatus(200);
});
