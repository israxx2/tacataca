<?php

use Illuminate\Database\Seeder;

class PartidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $i = 0;
	    $j = 0;

		for($i=1; $i<=50; $i++){

			DB::table('partidos')->insert([
            'evento_id' => 1,
            'albitro_id' => 1,
            ]);

            DB::table('partidos')->insert([
            'evento_id' => 2,
            'albitro_id' => 1,
            ]);

            DB::table('partidos')->insert([
            'evento_id' => 3,
            'albitro_id' => 1,
            ]);

            DB::table('partidos')->insert([
            'evento_id' => 4,
            'albitro_id' => 1,
            ]);

		}
	}

}