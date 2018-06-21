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
        
    DB::table('serivicios')->insert([
    		['descripcion' => 'Comunicación y diseño','id_servicios'=>1, 'id_servicio_padre' => NUll],
            ['descripcion' => 'Belleza y Cuidado Personal', 'id_servicios'=>2, 'id_servicio_padre' => NUll],
            ['descripcion' => 'Cursos y Clases', 'id_servicios'=>3, 'id_servicio_padre' => NUll],
            ['descripcion' => 'Fiestas y Eventos', 'id_servicios'=>4, 'id_servicio_padre' => NUll],
            ['descripcion' => 'Locutores', 'id_servicios'=>5, 'id_servicio_padre' => 1],
            ['descripcion' => 'Traductores','id_servicios'=>6, 'id_servicio_padre' => 1],
            ['descripcion' => 'Cosmetología','id_servicios'=>7, 'id_servicio_padre' => 2],
            ['descripcion' => 'Cuidado Personal','id_servicios'=>8, 'id_servicio_padre' => 2],
            ['descripcion' => 'Artes Plásticas','id_servicios'=>9, 'id_servicio_padre' => 3],
            ['descripcion' => 'Fotografía','id_servicios'=>10, 'id_servicio_padre' => 3],
            ['descripcion' => 'Personal Gastronómico','id_servicios'=>11, 'id_servicio_padre' => 4],
            ['descripcion' => 'Servicios Audiovisuales','id_servicios'=>12, 'id_servicio_padre' => 4]
			
        ]);
    }
}
