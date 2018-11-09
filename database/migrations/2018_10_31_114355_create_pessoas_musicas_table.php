<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasMusicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_musicas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pessoa_id')->nullable();
            $table->unsignedInteger('musica_id')->nullable();
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('set null');
            $table->foreign('musica_id')->references('id')->on('musicas')->onDelete('set null');
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
        Schema::dropIfExists('pessoas_musicas');
    }
}
