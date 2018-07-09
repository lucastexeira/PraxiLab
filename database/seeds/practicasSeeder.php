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
    		
            ['nombre_practica' => 'Practica1', 'descripcion'=>'Practica1', 'imagen' => '', 'id_practicante' => '1']
			
        ]);
    }
}
