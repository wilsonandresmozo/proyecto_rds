<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funciones_cargo')->insert([
        [
            'descripcion_funcion' => 'Planificar actividades empresariales',
            'estado' => true,
            'cargo_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'descripcion_funcion' => 'Controlar personal operativo',
            'estado' => true,
            'cargo_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'descripcion_funcion' => 'Realizar labores de produccion',
            'estado' => true,
            'cargo_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    }
}
