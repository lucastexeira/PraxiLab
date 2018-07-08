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
    		
            [ 'descripcion'=>'Practica1', 'img' => '', 'id_practicante' => '1']
			
        ]);
    }
}
