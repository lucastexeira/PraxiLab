<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidecia extends Model
{
    protected $table = "evidencias";

    protected $fillable = [ 'pathevidencia', 'fecha', 'id_persona'];
}
