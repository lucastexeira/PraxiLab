<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use App\Persona;
use App\Practica;
use App\Estado;
use App\PersonasServicios;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Session;

class ServicioController extends Controller
{
    public function verTodosLosServicios(){
$buscador= array();
        $pracPers = Practica::where('nombre_practica', 'like', '%'.Input::get('buscador').'%')
                    //->orWhere('body', 'like', '%'.Input::get('buscador').'%')
                    ->orderBy('id', 'desc')->get();
                    $rubros = Rubro::All();
                    $servicios = Servicio::all();
        
        return view('todosLosServicios')->with('buscador', $buscador)->with('servicios', $servicios)->with('rubros',$rubros)->with('pracPers',$pracPers);
        //dd($pracPers);
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
        $ruId = Rubro::find($id_rubro);

        
        return view('/servicios')->with('servicios', $servicios)->with('rubros',$rubros)->with('ruId',$ruId);

        //dd($ruId);
    }

    public function verUsuariosServicios($id_servicio){

        $servicio = Servicio::find($id_servicio);
        $rubros = Rubro::All();
        $pracPers = DB::Select('Select * from practicas inner join personas on practicas.id_practicante = personas.id 
                                                        inner join servicios on practicas.id_servicio = servicios.id 
                                                        where servicios.id = '.$id_servicio.''); 

        return view('/usuariosPorServicio')->with('pracPers',$pracPers)->with('servicio',$servicio)->with('rubros',$rubros);

        //dd($pracPers);
    }

    public function irAWizard(Request $request){

        $practica = new Practica();
        $rubros = Rubro::all();
        $servicios = Servicio::paginate(5);
        //$servicios = Servicio::where('id_rubro', $request->id_rubro)->pluck('id');

        return view('/wizard')->with('rubros',$rubros)->with('servicios',$servicios)->with('practica',$practica);

        //dd($servicios);
    }

    public function listadoPracticasEstados(Request $req){

        $rubros = Rubro::all();
        $req = Session::get('mail');
        $user = Persona::where('mail', $req)->first()->id;

        $soyPracticante = Practica::where('id_practicante', $user)->get();
        $idPra = Practica::where('id_practicante', $user)->get()->id;
        $estados = Estado::where('id_practica', '$idPra')->get();

        //$estados = Estado::where('id_practica', $soyPracticante->id);
        //$soyVoluntario = ;
        
        //return view('/listadoPracticasEstados')->with('rubros',$rubros);

        dd($soyPracticante->id);
    }

    public function irAbmPractica(Request $request){

        $rubros = Rubro::all();
        //$serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $rubros.'id_rubro');
        $servicios = Servicio::where('id_rubro', $request->id_rubro)->pluck('id');

        return view('/abmPractica')->with('rubros',$rubros)->with('servicios',$servicios);

        //dd($servicios);
    }

    public function createPractica(Request $req){

        //$session_id = session()->getId();
        $req = Session::get('mail');

        if ( $req ){
            $servicioId = DB::table('personas')->where('mail', $req)->first()->id;
        
            $practica = new Practica();
            $practica->nombre_practica = Input::get('nombre_practica');
            $practica->descripcion = Input::get('descripcion');
            $practica->imagen_practica = Input::get('imagen_practica');
            $practica->id_practicante = $servicioId;
            $practica->id_servicio = Input::get('id_servicio');
            $practica->save();
        }
    }

    
}
