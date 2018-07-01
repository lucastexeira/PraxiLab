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
            $table->increments('id_practica');
            $table->string('descripcion');
            $table->unsignedInteger('id_practicante');
            $table->unsignedInteger('id_voluntario');

            $table->foreign('id_practicante')->references('id_persona')->on('personas');
            $table->foreign('id_voluntario')->references('id_persona')->on('personas');

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
