<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('negocios_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('repartidor_id');
            $table->decimal('precio_envio',8,2)->nullable();
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('total',8, 2)->nullable();
            $table->date('fecha')->nullable();
            $table->text('comentario')->nullable();
            $table->foreign('negocios_id')->references('id')->on('negocios');
            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('repartidor_id')->references('id')->on('users');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
