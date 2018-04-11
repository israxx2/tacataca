<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrera_id')->unsigned();
            $table->integer('equipo_id')->unsigned()->nullable();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('nick')->nullable();
            $table->integer('c_nick')->default(0);
            $table->integer('elo')->default(1200);
            $table->integer('v_duelos_1v1')->default(0);
            $table->integer('v_torneos_1v1')->default(0);   
            $table->integer('juegos_totales_1v1')->default(0);
            $table->enum('tipo',['admin','estudiante'])->default("estudiante");
            $table->string('password');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
