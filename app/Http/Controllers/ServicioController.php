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

class ServicioController extends Controller
{
    public function verTodosLosServicios(){

        $buscador = Servicio::where('nombre_servicio', 'like', '%'.Input::get('buscador').'%')
                    //->orWhere('body', 'like', '%'.Input::get('buscador').'%')
                    ->orderBy('id', 'desc')->paginate(8);
                    $rubros = Rubro::All();
                    $servicios = Servicio::all();
        $pracPers = DB::Select('Select * from personas inner join practicas on personas.id = practicas.id_practicante
                                                       inner join personas_servicios on personas.id = personas_servicios.id_persona
                                                       inner join servicios on personas_servicios.id_servicio = servicios.id');
        
        return view('/todosLosServicios')->with('buscador', $buscador)->with('servicios', $servicios)->with('rubros',$rubros)->with('pracPers',$pracPers);
    }

    /*public function verServiciosPorRubro($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::find($id_rubro);
        
        return view('/todosLosServicios')->with('servicios', $servicios)->with('rubros',$rubros);

        //dd($servicios);
    }*/

    public function verServicios($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::All();
        $ruId = Rubro::find($id_rubro)->first();

        
        return view('/servicios')->with('servicios', $servicios)->with('rubros',$rubros)->with('ruId',$ruId);

        //dd($ruId);
    }

    public function verUsuariosServicios($id_servicio){

        $servicio = Servicio::find($id_servicio);
        $rubros = Rubro::All();
        $pracPers = DB::Select('Select * from personas inner join practicas on personas.id = practicas.id_practicante
                                                       inner join personas_servicios on personas.id = personas_servicios.id_persona
                                                       inner join servicios on personas_servicios.id_servicio = servicios.id
                                                       where servicios.id = '.$id_servicio.'');

        return view('/usuariosPorServicio')->with('pracPers',$pracPers)->with('servicio',$servicio)->with('rubros',$rubros);

        //dd($pracPers);
    }

    public function irAWizard(Request $request){

        $rubros = Rubro::all();
        $servicios = Servicio::all();
        //$servicios = Servicio::where('id_rubro', $request->id_rubro)->pluck('id');

        return view('/wizard')->with('rubros',$rubros)->with('servicios',$servicios);

        //dd($servicios);
    }

    public function listadoPracticasEstados(){

        $rubros = Rubro::all();
        
        return view('/listadoPracticasEstados')->with('rubros',$rubros);

        //dd($servicios);
    }

    public function irAbmPractica(Request $request){

        $rubros = Rubro::all();
        //$serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $rubros.'id_rubro');
        $servicios = Servicio::where('id_rubro', $request->id_rubro)->pluck('id');

        return view('/abmPractica')->with('rubros',$rubros)->with('servicios',$servicios);

        //dd($servicios);
    }

    

    
}
