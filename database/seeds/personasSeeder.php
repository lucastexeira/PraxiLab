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
    		
            [ 'username' => 'DamianR', 'nombre'=>'Damian', 'apellido' => 'Rosa', 'telefono' => '4444-5555', 'mail' => 'Usuario1@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cantpracticas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'LucasT', 'nombre'=>'Lucas', 'apellido' => 'TexeiraTresManzanas', 'telefono' => '5555-4444', 'mail' => 'Usuario2@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'KarenM', 'nombre'=>'Karmen', 'apellido' => 'Monsanto', 'telefono' => '5555-4444', 'mail' => 'Usuario3@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'GastonF', 'nombre'=>'Gaston', 'apellido' => 'Ferrari', 'telefono' => '5555-4444', 'mail' => 'Usuario3@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'SantiagoG', 'nombre'=>'Santiago', 'apellido' => 'Guiterrez', 'telefono' => '5555-4444', 'mail' => 'Usuario3@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'SofiaP', 'nombre'=>'Sofia', 'apellido' => 'Perez', 'telefono' => '5555-4444', 'mail' => 'Usuario3@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456'],

            [ 'username' => 'SusanaA', 'nombre'=>'Susana', 'apellido' => 'Aranda', 'telefono' => '5555-4444', 'mail' => 'Usuario3@mail.com', 'provincia' => '', 'zona' => '',
            'pais' => '', 'cantidad_creditos' => '1', 'estado' => '1', 'cant_practicas_hechas' => '1', 'img' =>'', 'password' => '123456']
			
        ]);
    }
}
