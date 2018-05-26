<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePartidoSingleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePartidoSingle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('goles');
            $table->integer('elo');
            $table->integer('elo_anterior');
            $table->enum('resultado',['victoria','derrota','empate']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partido_id')->references('id')->on('partidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallePartidoSingle');
    }
}
