<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitaTable extends Migration
{
    public function up()
    {
        Schema::create('receita', function (Blueprint $table) {
            $table->id('id_receitas');
            $table->string('nome_receita');
            $table->text('ingredientes');
            $table->string('modo_preparo');
            $table->float('calorias');
            $table->float('proteinas');
            $table->float('carboidratos');
            $table->float('gordura');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receita');
    }
};