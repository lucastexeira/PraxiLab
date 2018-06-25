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

    		['nombre_rubro' => 'Comunicación y diseño'],
    		['nombre_rubro' => 'Belleza y Cuidado Personal'],
            ['nombre_rubro' => 'Cursos y Clases'],
            ['nombre_rubro' => 'Fiestas y Eventos']

        ]);
    }
}
