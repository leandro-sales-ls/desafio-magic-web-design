<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_filme');
            $table->char('classificacao',2);
            $table->date('data_inclusao');
            $table->date('data_ult_alteracao');
        });
        Schema::create('atores', function (Blueprint $table) {
            $table->id();
            $table->string('nome_ator');
            $table->string('idade');
            $table->date('data_inclusao');
            $table->date('data_ult_alteracao');
        });
        Schema::create('diretor', function (Blueprint $table) {
            $table->id();
            $table->string('nome_diretor');
            $table->string('idade');
            $table->date('data_inclusao');
            $table->date('data_ult_alteracao');
        });
        Schema::create('filmes_atores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_filme');
            $table->foreignId('id_atores');
            $table->date('data_inclusao');
            $table->date('data_ult_alteracao');
        });
        Schema::create('filmes_diretor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_filme');
            $table->foreignId('id_diretor');
            $table->date('data_inclusao');
            $table->date('data_ult_alteracao');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmes','classificacao','atores','diretor');
    }
}
