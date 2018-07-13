<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use App\Persona;
use App\Practica;
use App\PersonasServicios;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class TransaccionController extends Controller
{
     public function verTransacciones(){

        $rubros = Rubro::all();
        
        return view('/transacciones')->with('rubros',$rubros);

        //dd($servicios);
    }
}
