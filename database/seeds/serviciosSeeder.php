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
    		
            //Comunicación y diseño
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Locutores'],
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Traductores'],
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Diseñadores Gráficos'],
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Marketing y Publicidad'],
            [ 'id_rubro'=>1, 'nombre_servicio' => 'Otros'],

            //Belleza y Cuidado Personal
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Cosmetología'],
            //[ 'id_rubro'=>2, 'nombre_servicio' => 'Cuidado Personal'],
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Depilación'],
            //[ 'id_rubro'=>2, 'nombre_servicio' => 'Estética'],
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Manicuría y Pedicuría'],
            /*[ 'id_rubro'=>2, 'nombre_servicio' => 'Maquilladoras y Peinadoras'],
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Peluquería'],*/
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Tatuajes y Piercings'],
            [ 'id_rubro'=>2, 'nombre_servicio' => 'Otros'],


            //Cursos y Clases
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Artes Plásticas'],
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Fotografía'],
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Idiomas'],
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Tatuajes'],
            //[ 'id_rubro'=>3, 'nombre_servicio' => 'Manejo'],
            [ 'id_rubro'=>3, 'nombre_servicio' => 'Otros'],

            //Fiestas y Eventos
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Personal Gastronómico'],
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Servicios Audiovisuales'],
            //[ 'id_rubro'=>4, 'nombre_servicio' => 'Personal Gastronómico'],
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Decoración y Ambientación'],
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Bebidas'],
            [ 'id_rubro'=>4, 'nombre_servicio' => 'Otros'],

            //Servicios para Mascotas
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Cuidado e Higiene'],
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Adiestramiento Canino'],
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Peluquerías Caninas'],
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Veterinaria'],
            [ 'id_rubro'=>5, 'nombre_servicio' => 'Otros'],

            //Fotografía, Música y Cine
			[ 'id_rubro'=>6, 'nombre_servicio' => 'Filmación'],
            [ 'id_rubro'=>6, 'nombre_servicio' => 'Fotografía'],
            [ 'id_rubro'=>6, 'nombre_servicio' => 'Videos'],
            [ 'id_rubro'=>6, 'nombre_servicio' => 'Iluminación'],
            [ 'id_rubro'=>6, 'nombre_servicio' => 'Otros'],

            //Ropa y Moda
            [ 'id_rubro'=>7, 'nombre_servicio' => 'Arreglos'],
            [ 'id_rubro'=>7, 'nombre_servicio' => 'Bordados'],
            [ 'id_rubro'=>7, 'nombre_servicio' => 'Confección'],
            [ 'id_rubro'=>7, 'nombre_servicio' => 'Corte y Moldería'],
            //[ 'id_rubro'=>7, 'nombre_servicio' => 'Estampados'],
            [ 'id_rubro'=>7, 'nombre_servicio' => 'Otros'],

            //Tecnología
            [ 'id_rubro'=>8, 'nombre_servicio' => 'Audio y Video'],
            [ 'id_rubro'=>8, 'nombre_servicio' => 'Computación'],
            [ 'id_rubro'=>8, 'nombre_servicio' => 'Consolas'],
            [ 'id_rubro'=>8, 'nombre_servicio' => 'Relojes'],
            [ 'id_rubro'=>8, 'nombre_servicio' => 'Otros'],

            //Delivery
            [ 'id_rubro'=>9, 'nombre_servicio' => 'Desayunos'],
            [ 'id_rubro'=>9, 'nombre_servicio' => 'Viandas'],
            [ 'id_rubro'=>9, 'nombre_servicio' => 'Otros'],

            //Hogar y Construcción
            [ 'id_rubro'=>10, 'nombre_servicio' => 'Mantenimiento'],
            [ 'id_rubro'=>10, 'nombre_servicio' => 'Carpinteria'],
            [ 'id_rubro'=>10, 'nombre_servicio' => 'Electricista'],
            [ 'id_rubro'=>10, 'nombre_servicio' => 'Pintura'],
            [ 'id_rubro'=>10, 'nombre_servicio' => 'Otros']
        ]);
    }
}
