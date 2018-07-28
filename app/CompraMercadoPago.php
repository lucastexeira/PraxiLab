<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraMercadoPago extends Model
{
    protected $table = "compra_mercadopago";

    protected $fillable = ['monto_creditos','cantidad_meses','estado','id_transaccion_mp'];
}
