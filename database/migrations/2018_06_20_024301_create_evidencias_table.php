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
            $table->increments('id_evidencia');
            $table->string('pathevidencia');
            $table->date('fecha');
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
        Schema::dropIfExists('evidencias');
    }
}
