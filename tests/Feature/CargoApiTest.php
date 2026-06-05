<?php

test('listar cargos', function () {

    $response = $this->getJson('/api/cargos');

    $response->assertStatus(200);

});