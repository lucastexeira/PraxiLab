<?php

use Illuminate\Database\Seeder;

class rubrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([

    		['imagen' => 'img/rubros/ComunicacionDiseno.png', 'nombre_rubro' => 'Comunicación y Diseño'],
    		['imagen' => 'img/rubros/Belleza.png', 'nombre_rubro' => 'Belleza y Cuidado Personal'],
            ['imagen' => 'img/rubros/Cursos.png', 'nombre_rubro' => 'Cursos y Clases'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Mascotas.png', 'nombre_rubro' => 'Servicios para Mascotas'],
            ['imagen' => 'img/rubros/Play.png', 'nombre_rubro' => 'Fotografía, Música y Cine'],
            ['imagen' => 'img/rubros/Moda.png', 'nombre_rubro' => 'Ropa y Moda'],
            ['imagen' => 'img/rubros/Tecno.png', 'nombre_rubro' => 'Tecnología'],
            ['imagen' => 'img/rubros/Delivery.png', 'nombre_rubro' => 'Delivery'],
            ['imagen' => 'img/rubros/Construc.png', 'nombre_rubro' => 'Hogar y Construcción']

            /*,
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos'],
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos']*/

        ]);
    }
}
