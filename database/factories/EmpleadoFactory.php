<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cargo;

/**
 * @extends Factory<Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'fecha_nacimiento' => fake()->date(),
            'fecha_ingreso' => fake()->date(),
            'salario' => fake()->numberBetween(1500000, 8000000),
            'estado' => fake()->boolean(),
            'cargo_id' => Cargo::inRandomOrder()->first()->id,
        ];
    }
}
