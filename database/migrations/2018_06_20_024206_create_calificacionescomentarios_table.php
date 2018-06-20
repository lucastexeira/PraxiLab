<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionescomentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacionescomentarios', function (Blueprint $table) {
            $table->increments('id_calificacion_comentario');
            $table->integer('calificacion');
            $table->string('comentario');
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
        Schema::dropIfExists('calificacionescomentarios');
    }
}
