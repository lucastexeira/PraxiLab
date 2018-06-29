<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = "transacciones";

    protected $fillable = ['monto_transferido','id_emisor','id_destinatario','id_practica'];
    
}
