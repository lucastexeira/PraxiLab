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

class ServicioController extends Controller
{
    public function verTodosLosServicios(){

        $id_rubro = null;
        $buscador = Servicio::where('nombre_servicio', 'like', '%'.Input::get('buscador').'%')
                    //->orWhere('body', 'like', '%'.Input::get('buscador').'%')
                    ->orderBy('id', 'desc')->paginate(6);
                    $rubros = Rubro::find($id_rubro);
                    $servicios = Servicio::all();
        
        return view('/todosLosServicios')->with('buscador', $buscador)->with('servicios', $servicios)->with('rubros',$rubros);
    }

    public function verServiciosPorRubro($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::find($id_rubro);
        
        return view('/todosLosServicios')->with('servicios', $servicios)->with('rubros',$rubros);

        //dd($servicios);
    }

    public function verServicios($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::find($id_rubro);
        
        return view('/servicios')->with('servicios', $servicios)->with('rubros',$rubros);

        //dd($servicios);
    }

    public function verUsuariosServicios($id_servicio=null){

        $servicios = Servicio::all();
        $serv = Servicio::find($id_servicio);
        $personas = Persona::all();
        $personasServicios = PersonasServicios::all();
        $practicas = Practica::all();

        return view('/usuariosPorServicio')->with('servicios', $servicios)->with('serv',$serv)->with('personas',$personas)->with('personasServicios',$personasServicios)->with('practicas',$practicas);

        //dd($ser);
    }

}
