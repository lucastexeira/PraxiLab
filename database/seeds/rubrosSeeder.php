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
            ['imagen' => 'img/rubros/Fiestas.png', 'nombre_rubro' => 'Fiestas y Eventos']

        ]);
    }
}
