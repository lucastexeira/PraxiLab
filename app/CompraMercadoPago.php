<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraMercadoPago extends Model
{
    protected $table = "compra_mercadopago";

    protected $fillable = ['id_transacciones','monto_creditos','cantidad_meses','estado'];
}
