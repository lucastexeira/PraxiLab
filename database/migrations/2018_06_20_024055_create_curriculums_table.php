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
            $table->increments('id_curriculum');
            $table->string('formacion_academica')->nullable();
            $table->string('formacion_complementaria')->nullable();
            $table->string('eperiencia')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('idiomas')->nullable();
            $table->string('referecias')->nullable();
            $table->string('otros_datos')->nullable();
            $table->unsignedInteger('id_persona');

            $table->foreign('id_persona')->references('id_persona')->on('personas');
            
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
