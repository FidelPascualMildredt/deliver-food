<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HorarioController;
// use App\Http\Controllers\NegocioController;
// use App\Http\Controllers\ProductoController;
// use App\Http\Controllers\CategoriaController;
// use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\Api\TipoUsuarioController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NegocioController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProductoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('mirutaapiG',[PedidoController::class,'index'])->name('pedido.index');
// Route::post('mirutaapiP',[PedidoController::class,'index'])->name('pedido.store');
// Route::put('mirutaapip',[PedidoController::class,'index'])->name('pedido.update');
// Route::delete('mirutaapiD',[PedidoController::class,'destroy'])->name('pedido.destroy');



// Route::Apiresource('categorias',CategoriaController::class);
// // Route::Apiresource('horarios',HorarioController::class);
// Route::Apiresource('negocio',NegocioController::class);
// // Route::Apiresource('pedidos',PedidoController::class);
// Route::Apiresource('productos',ProductoController::class);
// Route::Apiresource('tipo_usuarios',TipoUsuarioController::class);
// Route::Apiresource('users',UserController::class);

