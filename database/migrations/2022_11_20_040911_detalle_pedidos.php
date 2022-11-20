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
        Schema::create('detalle__pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productos_id');
            $table->unsignedBigInteger('pedidos_id');
            $table->integer('cantidad');
            $table->decimal('precio',8, 2);
            $table->decimal('total', 8, 2);
            $table->text('comentario');
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreign('pedidos_id')->references('id')->on('pedidos');
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
        Schema::dropIfExists('detalle__pedidos');
    }
};
