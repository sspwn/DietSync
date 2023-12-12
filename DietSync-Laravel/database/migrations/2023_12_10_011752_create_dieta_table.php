<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietaTable extends Migration
{
    public function up()
    {
        Schema::create('dieta', function (Blueprint $table) {
            $table->id('id_dieta');
            $table->string('nome_dieta');
            $table->string('tipo_dieta');
            $table->float('calorias');
            $table->float('proteinas');
            $table->float('carboidratos');
            $table->float('gorduras');
            $table->unsignedBigInteger('FK_usuario_id_usuario');
            $table->timestamps();

            $table->foreign('FK_usuario_id_usuario')->references('id_user')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dieta');
    }
};