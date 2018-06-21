<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serivicios', function (Blueprint $table) {
            $table->increments('id_servicios');
            $table->string('descripcion');
            $table->integer('id_servicio_padre')->nullable(); //Esto es para que el los servicios pertenezcan a otros servicios. Es posible que cambiemos esto por rubros.
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
        Schema::dropIfExists('serivicios');
    }
}
