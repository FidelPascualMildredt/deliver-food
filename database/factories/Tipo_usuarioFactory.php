<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipo_usuario>
 */
class Tipo_usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tipo_usuario::class;
    public function definition()
    {
        return [
            'nombre' => fake()->name()
        ];
    }
}
