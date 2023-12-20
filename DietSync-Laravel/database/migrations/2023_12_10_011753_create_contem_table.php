<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContemTable extends Migration
{
    public function up()
    {
        Schema::create('contem', function (Blueprint $table) {
            $table->unsignedBigInteger('FK_receita_id_receitas')->nullable();
            $table->unsignedBigInteger('FK_dieta_id_dieta')->nullable();

            $table->foreign('FK_receita_id_receitas')->references('id_receitas')->on('receita')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('FK_dieta_id_dieta')->references('id_dieta')->on('dietas')->onDelete('set null')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contem');
    }
};
