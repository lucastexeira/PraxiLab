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
            $table->unsignedInteger('historial_practica')->nullable();
            $table->integer('estado'); // 1= esperando pago 0= pago completado

            $table->foreign('id_emisor')->references('id')->on('personas');
            $table->foreign('id_destinatario')->references('id')->on('personas');
            $table->foreign('historial_practica')->references('id')->on('historial_practicas');
            
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
