<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreinoTable extends Migration
{

    public function up()
    {
        Schema::create('treino', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('tipo');
            $table->text('exercicios');
            $table->integer('repeticoes');
            $table->integer('series');
            $table->string('objetivo');
            $table->string('duracao');
            $table->string('frequencia');
            $table->string('nome_treino');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('treino');
    }
};
