<?php

namespace Database\Seeders;

use App\Models\Tipo_usuario;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayTipo = [
            'Administrador',
            'Repartidor',
            'Cliente',
            'Negocio'
        ];

        foreach ($arrayTipo as $tipo) {
            Tipo_usuario::create([
                'nombre' => $tipo
            ]);
        }


    }
}
