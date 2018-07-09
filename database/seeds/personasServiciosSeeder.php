<?php

use Illuminate\Database\Seeder;

class personasServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas_servicios')->insert([
    		
            [ 'id_persona' => '1', 'id_servicio' => '1'],
			[ 'id_persona' => '2', 'id_servicio' => '2']

        ]);
    }
}
