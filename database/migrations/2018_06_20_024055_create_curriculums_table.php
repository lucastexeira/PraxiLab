<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formacion_academica')->nullable();
            $table->string('formacion_complementaria')->nullable();
            $table->string('experiencia')->nullable();
            $table->longtext('descripcion')->nullable(); //Descripcion iria en Persona
            $table->string('idiomas')->nullable();
            $table->string('referencias')->nullable();
            $table->string('otros_datos')->nullable();
            $table->unsignedInteger('id_persona');

            $table->foreign('id_persona')->references('id')->on('personas');
            
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
        Schema::dropIfExists('curriculums');
    }
}
