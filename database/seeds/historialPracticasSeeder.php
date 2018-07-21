<?php

use Illuminate\Database\Seeder;

class historialPracticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historial_practicas')->insert([

    		['id_estado' => '2','id_voluntario' => '1','id_practica' => '2'],
    		['id_estado' => '1','id_voluntario' => '2','id_practica' => '3']

        ]);
    }
}
