<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio>
 */
class NegocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->company(),
            'direccion' => fake()->address(),
            'correo' => fake()->unique()->safeEmail(),
            'telefono' => fake()->tollFreePhoneNumber(),
            'calificacion'=> fake()->randomDigit(),
            'categorias_id'=> Categoria::where('tipo_cat','negocio')->get()->random()->id
        ];
    }
}
