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
        Schema::create('personas_profesiones', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_persona');
            $table->unsignedInteger('id_profesion');
            
            $table->foreign('id_profesion')->references('id')->on('profesiones');
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
        Schema::dropIfExists('personas_profesiones');
    }
}

