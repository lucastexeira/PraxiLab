<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_practica');
            $table->string('descripcion');
            $table->string('imagen_practica')->nullable();
            $table->unsignedInteger('id_practicante');
            $table->unsignedInteger('id_servicio');
            $table->unsignedInteger('id_voluntario')->nullable();

            $table->foreign('id_practicante')->references('id')->on('personas');
            $table->foreign('id_servicio')->references('id')->on('servicios');
            $table->foreign('id_voluntario')->references('id')->on('personas');

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
        Schema::dropIfExists('practicas');
    }
}
