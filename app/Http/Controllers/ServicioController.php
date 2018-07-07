<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use App\Persona;
use App\PersonasServicios;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ServicioController extends Controller
{
    public function verServicios($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::find($id_rubro);
        
        return view('/servicios')->with('servicios', $servicios)->with('rubros',$rubros);

        //dd($servicios);
    }

    public function verUsuariosServicios($id_servicio){

        $servicios = Servicio::all();
        $personas = Persona::all();
        $personasServicios = PersonasServicios::all();
        /*$ru = Rubro::all();
        $rubros = Rubro::find($id_rubro);
        $serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $ru.'id');*/

        //return view('/servicios')->with('servicios', $servicios)->with('serviciosPorRubro',$serviciosPorRubro)->with('rubros',$rubros)->with('ru',$ru);

        dd($personasServicios);
    }
}
