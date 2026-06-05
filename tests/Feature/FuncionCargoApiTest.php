<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('listar funciones cargo', function () {

    $user = User::first();

    Sanctum::actingAs($user);

    $response = $this->getJson('/api/funciones-cargo');

    $response->assertStatus(200);
});
