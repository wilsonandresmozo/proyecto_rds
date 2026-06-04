<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargos')->insert([
        [
            'nombre_cargo' => 'Gerente',
            'descripcion' => 'Administra la empresa',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nombre_cargo' => 'Supervisor',
            'descripcion' => 'Supervisa procesos',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nombre_cargo' => 'Operario',
            'descripcion' => 'Ejecuta actividades operativas',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    }
}
