<?php

use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculums')->insert([
        	[
        		'formacion_academica' => 'Desarrollador Web en Universidad de La Matanza',
        		'formacion_complementaria' => '',
        		'experiencia' => '6 meses en DevWork',
        		'idiomas' => 'Ingles basico',
        		'referencias' => '',
        		'otros_datos' => '',
        		'id_persona' => '2',
        	]
        ]);
    }
}
