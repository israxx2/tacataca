<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => 'MEDICINA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN EDUCACIÓN FÍSICA',
        ]);
       
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN INGLES',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA GENERAL BÁSICA CON MENCIÓN',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN EDUCACIÓN ESPECIAL',
        ]);
      
      DB::table('carreras')->insert([
            'nombre' => 'EDUCACIÓN PARVULARIA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN LENGUA CASTELLANA Y COMUNICACIÓN',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN EDUCACIÓN ESPECIAL',
        ]);
         
        DB::table('carreras')->insert([
            'nombre' => 'EDUCACIÓN PARVULARIA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA GENERAL BÁSICA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'ENFERMERÍA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'KINESIOLOGÍA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'PSICOLOGÍA',
        ]);
         
        DB::table('carreras')->insert([
            'nombre' => 'NUTRICIÓN Y DIETÉTICA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'CONSTRUCCIÓN CIVIL',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGEIERÍA CIVIL',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA CIVIL INDUSTRIAL',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA CIVIL INFORMÁTICA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA EJECUCIÓN EN COMPUTACIÓN E INFORMÁTICA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA EN CONSTRUCCIÓN',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA CIVIL ELECTRÓNICA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'AUDITORÍA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA COMERCIAL',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'ADMINISTRACIÓN PÚBLICA',
        ]);
      
        DB::table('carreras')->insert([
            'nombre' => 'SOCIOLOGÍA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'TRABAJO SOCIAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'AGRONOMÍA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA EN BIOTECNOLOGÍA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'INGENIERÍA FORESTAL',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN RELIGIÓN Y FILOSOFÍA',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN CIENCIAS',
        ]);

        DB::table('carreras')->insert([
            'nombre' => 'PEDAGOGÍA EN MATEMÁTICAS Y COMPUTACIÓN',
        ]);
    }
}
