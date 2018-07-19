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
            ['estado' => 'Finalizada']

        ]);
    }
}
