<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;
use App\Models\FuncionCargo;

class FuncionCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::all()->each(function ($cargo) {
            FuncionCargo::factory()
                ->count(5)
                ->create([
                    'cargo_id' => $cargo->id,
                ]);
        });
    }
}