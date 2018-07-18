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

            ['nombre_practica' => 'Clase de Guitarra Acustica', 'descripcion'=>'Clases de guitarra, Ukelele o audioperceptiva orientadas a que puedas disfrutar del instrumento de forma cómoda y a tus tiempos para que estés en condiciones de tocarlo frente a amigos/as o un público como solista o en una banda.
            ',
            'imagen_practica' => 'img/practicas/practica_guitarra_1.png', 'id_practicante' => '2', 'id_servicio'=>'13'],

            ['nombre_practica' => 'Practica2', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica2.png', 'id_practicante' => '2', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica3', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '3', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica4', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '4', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica5', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '2', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica6', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '2', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica7', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '3', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica8', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '4', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica9', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '1', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica10', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '1', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica11', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '1', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica12', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '5', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica13', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '2', 'id_servicio'=>'1'],

            ['nombre_practica' => 'Practica14', 'descripcion'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'imagen_practica' => 'img/practicas/practica3.png', 'id_practicante' => '4', 'id_servicio'=>'1']

        ]);
}
}
