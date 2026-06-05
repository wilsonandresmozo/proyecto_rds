<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('listar cargos', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $response = $this->getJson('/api/cargos');

    $response->assertStatus(200);
});