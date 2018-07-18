<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialPracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_practicas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('id_voluntario');
            $table->unsignedInteger('id_practica');

            $table->foreign('id_estado')->references('id')->on('estados');
            $table->foreign('id_voluntario')->references('id')->on('personas');
            $table->foreign('id_practica')->references('id')->on('practicas');

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
        Schema::dropIfExists('historial_practicas');
    }
}
