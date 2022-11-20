<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalle_Pedido>
 */
class Detalle_PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cantidad = rand(1, 10);
        $precio = fake()->randomFloat(2,10,500);
        return [
            'productos_id' => Producto::all()->random()->id,
            'pedidos_id' => Pedido::all()->random()->id,
            'cantidad'=> $cantidad,
            'precio' => $precio,
            'total' => $cantidad * $precio,
            'comentario' => fake()->text()
            //
        ];
    }
}
