<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pathevidencia')->nullable();//imagen de la practica hecha
            $table->date('fecha')->nullable();
            $table->unsignedInteger('id_historial_practica');
            $table->integer('calificacion')->nullable();
            $table->string('comentario')->nullable();
            $table->unsignedInteger('id_autor')->nullable();
			$table->unsignedInteger('id_destinatario')->nullable();

            $table->foreign('id_historial_practica')->references('id')->on('historial_practicas');
            $table->foreign('id_autor')->references('id')->on('personas');
			$table->foreign('id_destinatario')->references('id')->on('personas');

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
        Schema::dropIfExists('evidencias');
    }
}
