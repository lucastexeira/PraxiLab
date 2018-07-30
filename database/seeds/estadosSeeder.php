<?php

use Illuminate\Database\Seeder;

class estadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([

    		['estado' => 'Solicitado'],
    		['estado' => 'En Curso'],
            ['estado' => 'Sin Calificar'],
            ['estado' => 'Finalizada'],
            ['estado' => 'Esperando calificación ']// Esto es para que el mismo usuario no califique dos veces la misma practica. posiblemente no lo usemos nunca ¯\_(ツ)_/¯.

        ]);
    }
}
