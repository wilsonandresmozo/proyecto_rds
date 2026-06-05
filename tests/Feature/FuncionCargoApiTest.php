<?php

test('listar funciones cargo', function () {

    $response = $this->getJson('/api/funciones-cargo');

    $response->assertStatus(200);

});
