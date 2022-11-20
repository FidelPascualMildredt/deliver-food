<?php

namespace Database\Factories;

use App\Models\Negocio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'negocios_id' => Negocio::all()->random()->id,
            'cliente_id' => User::all()->random()->id,
            'repartidor_id' => User::all()->random()->id,
            'precio_envio' => fake()->randomFloat(2,10,500),
            'subtotal' => fake()->randomFloat(2,10,500),
            'total' => fake()->randomFloat(2,10,500),
            'fecha' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'comentario' => fake()->text()
        ];
    }
}
