<?php

use Illuminate\Database\Seeder;

class BuzonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
    	for($i=1; $i<=2; $i++){
    		DB::table('buzones')->insert([
			'user_id' => $i,
        	]);	
    	}
    }
}
