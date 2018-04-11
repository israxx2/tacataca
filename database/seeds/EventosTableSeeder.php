<?php

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('eventos')->insert([
		'user_id' => 1,
		'modalidad_id' =>1,
		'nombre' =>'PRIMER DUELO 1V1 SINGLES',
		'descripcion' =>'Esta es una descripción del evento para pruebas.',
		'tipo' =>'1v1',
		'fecha'=>'2018-04-29',
		'hora'=>'14:00',
    	]);	

    	DB::table('eventos')->insert([
		'user_id' => 1,
		'modalidad_id' =>2,
		'nombre' =>'PRIMER TORNEO 1V1 SINGLES',
		'descripcion' =>'Esta es una descripción del evento para pruebas.',
		'tipo' =>'1v1',
		'fecha'=>'2018-05-10',
		'hora'=>'14:00',
    	]);	

    	DB::table('eventos')->insert([
		'user_id' => 1,
		'modalidad_id' =>1,
		'nombre' =>'PRIMER DUELO 2V2 DOBLES',
		'descripcion' =>'Esta es una descripción del evento para pruebas.',
		'tipo' =>'2v2',
		'fecha'=>'2018-05-20',
		'hora'=>'14:00',
    	]);	

    	DB::table('eventos')->insert([
		'user_id' => 1,
		'modalidad_id' =>2,
		'nombre' =>'PRIMER TORNEO 2V2 DOBLES',
		'descripcion' =>'Esta es una descripción del evento para pruebas.',
		'tipo' =>'2v2',
		'fecha'=>'2018-05-27',
		'hora'=>'14:00',
    	]);	
	
    }
}
