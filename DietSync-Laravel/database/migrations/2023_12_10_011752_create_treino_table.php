<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoTable extends Migration
{

    public function up()
    {
        Schema::create('treino', function (Blueprint $table) {
            $table->id('id_treino');
            $table->string('objetivo');
            $table->integer('duracao');
            $table->integer('frequencia');
            $table->string('exercicios');
            $table->integer('serie');
            $table->integer('repeticao');
            $table->string('nome_treino');
            $table->unsignedBigInteger('FK_usuario_id_usuario');
            $table->timestamps();

            $table->foreign('FK_usuario_id_usuario')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('treino');
    }
};
