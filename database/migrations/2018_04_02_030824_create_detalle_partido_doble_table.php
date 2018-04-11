<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePartidoDobleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePartidoDoble', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->integer('goles');
            $table->enum('resultado',['victoria','derrota','empate']);
            $table->integer('elo')->default(1200);
            $table->timestamps();

            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
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
        Schema::dropIfExists('detallePartidoDoble');
    }
}
