<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->float('monto_transferido')->nullable();
            $table->unsignedInteger('id_emisor')->nullable();
            $table->unsignedInteger('id_destinatario')->nullable();
            $table->unsignedInteger('id_practica');

            $table->foreign('id_emisor')->references('id_persona')->on('personas');
            $table->foreign('id_destinatario')->references('id_persona')->on('personas');
            $table->foreign('id_practica')->references('id_practica')->on('practicas');

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
        Schema::dropIfExists('transacciones');
    }
}
