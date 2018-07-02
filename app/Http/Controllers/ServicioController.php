<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
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
        $serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $rubros.'id');

        return view('/servicios')->with('servicios', $servicios)->with('serviciosPorRubro',$serviciosPorRubro)->with('rubros',$rubros);

        //$rubros = Rubro::find($id_rubro);

        //dd($serviciosPorRubro);
    }
}
