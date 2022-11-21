<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoUsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// individuales
Route::get('mirutaapiG',[PedidoController::class,'index'])->name('pedido.index');
Route::post('mirutaapiP',[PedidoController::class,'index'])->name('pedido.store');
Route::put('mirutaapip',[PedidoController::class,'index'])->name('pedido.update');
Route::delete('mirutaapiD',[PedidoController::class,'destroy'])->name('pedido.destroy');


Route::resource('categoria',CategoriaController::class);
Route::resource('horarios',HorarioController::class);
Route::resource('negocio',NegocioController::class);
Route::resource('pedidos',PedidoController::class);
Route::resource('productos',ProductoController::class);
Route::resource('tipo_usuario',TipoUsuarioController::class);
Route::resource('users',UserController::class);

Route::get('pedidos-detalle/{pedido}',[PedidoController::class,'DetallePedido'])->name('pedidos.detalle');
