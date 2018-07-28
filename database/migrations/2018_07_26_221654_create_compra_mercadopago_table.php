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
            $table->integer('monto_creditos');
            $table->integer('cantidad_meses');
            $table->integer('estado'); // 1= esperando pago 0= pago completado
            $table->string('id_transaccion_mp')->nullable();

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
