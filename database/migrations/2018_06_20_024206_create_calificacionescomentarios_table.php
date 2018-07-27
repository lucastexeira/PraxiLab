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
            $table->increments('id');
            $table->integer('calificacion')->nullable();
            $table->string('comentario')->nullable();
            $table->unsignedInteger('id_autor');
			$table->unsignedInteger('id_destinatario');
			$table->unsignedInteger('id_practica');

            $table->foreign('id_autor')->references('id')->on('personas');
			$table->foreign('id_destinatario')->references('id')->on('personas');
			//$table->foreign('id_practica')->references('id_practica')->on('practicas');

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
