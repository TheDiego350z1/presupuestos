<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimientos>
 */
class MovimientosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'monto' => $this->faker->randomFloat(1, 20, 30),
            'fecha' => $this->faker->date(),
            'imagen' => $this->faker->image('public/storage/', 640, 480, null, true),
            'tipo' => 1,
            'saldo' => 0,
            'user_id' => 1
        ];
    }
}
