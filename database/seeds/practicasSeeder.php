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
    		
            ['nombre_practica' => 'Practica1', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica1.png', 'id_practicante' => '1', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica2', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica2.png', 'id_practicante' => '2', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '3', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '4', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '2', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '2', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '3', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '4', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '1', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '1', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '1', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '5', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '2', 'id_servicio'=>'1'],
             
            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '4', 'id_servicio'=>'1']
			
        ]);
    }
}
