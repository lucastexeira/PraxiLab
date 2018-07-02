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
        $rubros = Rubro::all();
        $rubroId = Rubro::where($rubros.'id_rubro', '=', $id_rubro);
        $serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $id_rubro);

        //return view('/servicios')->with('servicios', $servicios)->with('serviciosPorRubro',$serviciosPorRubro)->whith('rubros',$rubros);

        dd($serviciosPorRubro);
    }
}
