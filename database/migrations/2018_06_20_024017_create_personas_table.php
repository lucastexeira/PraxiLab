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
            $table->string('telefono')->nullable();
            $table->string('mail');
            $table->string('provincia')->nullable();
            $table->string('zona')->nullable();
            $table->string('pais')->nullable();
            $table->integer('estado')->nullable(); // esto es para definir si el usuario fue borrado 
            $table->string('contrasena');
            $table->float('promedio_calificacion')->nullable();
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
