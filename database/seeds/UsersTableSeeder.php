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
            'carrera_id' => 17,
            'nombres' => 'EDUARDO ISRAEL',
            'apellidos' => 'GONZALEZ TRONCOSO',
            'nick' => 'eduugt',
            'elo' => 0,
            'tipo' => 'admin',
            'email' => 'admin.eduardo@tacatacaucm.com',
            'password' => bcrypt('s3np32d1d'),
            ]);

        DB::table('users')->insert([
            'carrera_id' => 22,
            'nombres' => 'ADMIN JOCHE',
            'apellidos' => 'NARVAEZ',
            'nick' => 'joche taca',
            'elo' => 0,
            'tipo' => 'admin',
            'email' => 'admin.javier@tacatacaucm.com',
            'password' => bcrypt('s3np32d1d'),
            ]);

        
        /*
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
		
    */

    }
}
