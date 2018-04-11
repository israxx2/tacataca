<?php

use Illuminate\Database\Seeder;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$i=0;

        for($i=1; $i<=50; $i++){
        	DB::table('equipos')->insert([
            'nombre' => 'Equipo '. $i,
            ]);
        }
        
    }
}
