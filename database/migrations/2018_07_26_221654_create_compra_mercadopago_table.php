<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraMercadopagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_mercadopago', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_transacciones')->nullable();
            $table->integer('monto_creditos');
            $table->integer('cantidad_meses');
            $table->integer('estado');

            $table->foreign('id_transacciones')->references('id')->on('transacciones');
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
        Schema::dropIfExists('compra_mercadopago');
    }
}
