<?php

namespace Database\Factories;

use App\Models\Horario;
use App\Models\Negocio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio_Horario>
 */
class Negocio_HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'negocios_id'=> Negocio::all()->random()->id,
            'horarios_id'=> Horario::all()->random()->id,
        ];
    }
}
