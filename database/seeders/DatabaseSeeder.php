<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Negocio;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Horario;
use App\Models\Negocio_Horario;
use App\Models\Pedido;
use App\Models\Detalle_Pedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            TipoUsuarioSeeder::class,
        ]);
        Categoria::factory(10)->create();
        User::factory(10)->create();
        Negocio::factory(10)->create();
        Producto::factory(10)->create();
        Horario::factory(10)->create();
        Negocio_Horario::factory(10)->create();
        Pedido::factory(10)->create();
        Detalle_Pedido::factory(10)->create();
    }
}
