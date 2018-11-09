<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PessoasTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf')->nullable();
            $table->unsignedInteger('cidade_id')->nullable();
            $table->unsignedInteger('profissao_id')->nullable();
            $table->foreign('profissao_id')->references('id')->on('profissoes')->onDelete('set null');
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pessoas');
    }
}
