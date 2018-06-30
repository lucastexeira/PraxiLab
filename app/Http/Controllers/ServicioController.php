<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;

class ServicioController extends Controller
{
    public function verServicios(){

        $servicios = Servicio::all();

        return view('/servicios')->with('servicios', $servicios);
    }
}
