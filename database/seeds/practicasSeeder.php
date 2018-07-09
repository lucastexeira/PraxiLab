<?php

use Illuminate\Database\Seeder;

class practicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practicas')->insert([
    		
            ['nombre_practica' => 'Practica1', 'descripcion'=>'Practica1', 'imagen' => 'img/practicas/practica1.png', 'id_practicante' => '1'],
            ['nombre_practica' => 'Practica2', 'descripcion'=>'Practica2', 'imagen' => 'img/practicas/practica1.png', 'id_practicante' => '2']
			
        ]);
    }
}
