<?php

use Illuminate\Database\Seeder;

class serviciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    DB::table('servicios')->insert([
    		
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Locutores'],
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Traductores'],
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Cosmetología'],
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Cuidado Personal'],
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Artes Plásticas'],
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Fotografía'],
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Personal Gastronómico'],
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Servicios Audiovisuales']
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Personal Gastronómico'],
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Servicios Audiovisuales']
			
        ]);
    }
}
