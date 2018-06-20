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
            $table->string('provincia');
            $table->string('zona');
            $table->string('pais');
            $table->string('password');
            $table->integer('practicas_cantidad');
            $table->integer('creditos_cantidad');
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
