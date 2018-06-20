<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasprofesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personasprofesiones', function (Blueprint $table) {
            $table->increments('id_personasprofesiones');

            $table->unsignedInteger('id_persona');
            $table->unsignedInteger('id_profesion');
            
            $table->foreign('id_profesion')->references('id_profesion')->on('profesiones');
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
        Schema::dropIfExists('personasprofesiones');
    }
}
