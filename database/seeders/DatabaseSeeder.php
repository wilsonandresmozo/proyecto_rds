<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456'),
        ]);

        $this->call([
            CargoSeeder::class,
            FuncionCargoSeeder::class,
            EmpleadoSeeder::class,
        ]);
    }
}
