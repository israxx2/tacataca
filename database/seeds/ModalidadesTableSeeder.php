<?php

use Illuminate\Database\Seeder;

class ModalidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidades')->insert([
		'nombre' =>'DUELO',
		'descripcion' =>'Modalidad en la cual los jugadores jugarán en contra para disputar medallas.',
    	]);	

    	DB::table('modalidades')->insert([
		'nombre' =>'TORNEO',
		'descripcion' =>'Modalidad en la cual los jugadores jugarán en cuadrangulares para llevarse el premio gordo.',
    	]);	
    }
}
