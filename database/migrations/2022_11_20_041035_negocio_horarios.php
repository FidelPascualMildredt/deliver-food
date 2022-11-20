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
        Schema::create('negocio__horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('negocios_id');
            $table->unsignedBigInteger('horarios_id');
            $table->foreign('negocios_id')->references('id')->on('negocios');
            $table->foreign('horarios_id')->references('id')->on('horarios');
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
        Schema::dropIfExists('negocio__horarios');
    }
};
