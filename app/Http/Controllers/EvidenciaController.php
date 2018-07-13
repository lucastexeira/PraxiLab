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

class EvidenciaController extends Controller
{
    public function cargarEvidencia(){

        $rubros = Rubro::all();

        return view('/cargarEvidencia')->with('rubros', $rubros);
    }

    public function verEvidencia(){

        $rubros = Rubro::all();

        return view('/verEvidencia')->with('rubros', $rubros);

        //dd($rubros);
    }
}
