<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('meta');
            $table->string('nome_usuario');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('data_nasc');
            $table->char('sexo', 3);
            $table->float('peso');
            $table->float('altura');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
