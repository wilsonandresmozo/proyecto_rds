<?php

namespace Database\Factories;

use App\Models\FuncionCargo;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cargo;


/**
 * @extends Factory<FuncionCargo>
 */
class FuncionCargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'descripcion_funcion' => fake()->sentence(),
            'estado' => fake()->boolean(),
            'cargo_id' => Cargo::inRandomOrder()->first()->id,
        ];
    }
}
