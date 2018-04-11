<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
      
            CarrerasTableSeeder::class,
            EquiposTableSeeder::class,
            UsersTableSeeder::class,
            BuzonesTableSeeder::class,
            ModalidadesTableSeeder::class,
            EventosTableSeeder::class,
         ]);
    }
}
