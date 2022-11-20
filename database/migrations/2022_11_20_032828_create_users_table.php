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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->char('nickname');
            $table->string('correo')->unique()->nullable();
            $table->string('telefono')->unique();
            $table->string('foto_perfil');
            $table->string('contrasena');
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('tipo_usuarios_id');
            $table->foreign('tipo_usuarios_id')->references('id')->on('tipo_usuarios');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
