<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('mail');
            $table->string('provincia')->nullable();
            $table->string('zona')->nullable(); 
            $table->string('pais')->nullable();
            $table->double('cantidad_creditos')->nullable();
            $table->integer('estado')->nullable(); // esto es para definir si el usuario fue borrado 
            $table->integer('cant_practicas_hechas'); /* esto es util para validar que el usuario voluntario hizo 
                                                         la cantidad de practicas necesarias.*/
            $table->string('password')->nullable(); 
            $table->integer('practicas_cantidad')->nullable();
            $table->integer('creditos_cantidad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
