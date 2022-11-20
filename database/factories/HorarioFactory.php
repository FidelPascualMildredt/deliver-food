<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horario>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dia' => fake()->randomElement([
                'Lunes',
                'Martes',
                'Miercoles',
                'Jueves',
                'Viernes',
                'Sabado',
                'Domingo']),
            'hora_inicio'=>fake()->time($format = 'H:i:s', $max = 'now'),
            'hora_final'=>fake()->time($format = 'H:i:s', $max = 'now')
        ];
    }
}
