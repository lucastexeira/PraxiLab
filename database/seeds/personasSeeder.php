<?php

use Illuminate\Database\Seeder;

class personasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // [ 'username' => '', 'nombre'=>'', 'apellido' => '', 'telefono' => '', 'mail' => '', 'provincia' => '', 'zona' => '',
    // 'pais' => '', 'cantidad_creditos' => '', 'estado' => '', 'cant_practicas_hechas' => '', 'img' =>'', 'password' => '']

    public function run()
    {
        DB::table('personas')->insert([
    		
            [ 'username' => 'Usuario1', 'nombre'=>'Usuario1', 'apellido' => 'Usuario1', 'telefono' => '4444-5555', 'mail' => 'Usuario1@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cantpracticas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'Usuario2', 'nombre'=>'Usuario2', 'apellido' => 'Usuario2', 'telefono' => '5555-4444', 'mail' => 'Usuario2@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456']
			
        ]);
    }
}
