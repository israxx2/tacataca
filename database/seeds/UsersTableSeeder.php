<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
		DB::table('users')->insert([
            'carrera_id' => 18,
            'nombres' => 'EDUARDO ISRAEL',
            'apellidos' => 'GONZALEZ TRONCOSO',
            'nick' => 'bethel',
            'elo' => 800,
            'tipo' => 'admin',
            'email' => 'israxx2@gmail.com',
            'password' => bcrypt('asdqwe123'),
            ]);

        $i = 0;
    	$j = 1;
        for($i=1; $i<=25; $i++){
    		
            DB::table('users')->insert([
			'carrera_id' => $i,
            'equipo_id' => $j,
            'nombres' => str_random(7).' '.str_random(7),
            'apellidos' => str_random(7).' '.str_random(7),
            'nick' => str_random(7),
            'elo' => 800,
            'tipo' => 'estudiante',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        	]);	

        	DB::table('users')->insert([
			'carrera_id' => $i,
            'equipo_id' => $j,
            'nombres' => str_random(7).' '.str_random(7),
            'apellidos' => str_random(7).' '.str_random(7),
            'nick' => str_random(7),
            'elo' => 800,
            'tipo' => 'estudiante',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        	]);	

            $j++;

        	DB::table('users')->insert([
			'carrera_id' => $i,
            'equipo_id' => $j,
            'nombres' => str_random(7).' '.str_random(7),
            'apellidos' => str_random(7).' '.str_random(7),
            'nick' => str_random(7),
            'elo' => 800,
            'tipo' => 'estudiante',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        	]);	

        	DB::table('users')->insert([
			'carrera_id' => $i,
            'equipo_id' => $j,
            'nombres' => str_random(7).' '.str_random(7),
            'apellidos' => str_random(7).' '.str_random(7),
            'nick' => str_random(7),
            'elo' => 800,
            'tipo' => 'estudiante',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        	]);	

            $j++;
    	}
		


    }
}
