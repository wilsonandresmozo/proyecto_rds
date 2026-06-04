<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleados')->insert([
        [
            'nombres' => 'Wilson',
            'apellidos' => 'Mozo',
            'fecha_nacimiento' => '2000-01-15',
            'fecha_ingreso' => '2025-01-10',
            'salario' => 2500000,
            'estado' => true,
            'cargo_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nombres' => 'Maria',
            'apellidos' => 'Perez',
            'fecha_nacimiento' => '1998-03-20',
            'fecha_ingreso' => '2024-05-15',
            'salario' => 1800000,
            'estado' => true,
            'cargo_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    }
}
