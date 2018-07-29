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
use Session;
use Illuminate\Support\Facades\Redirect;

class ServicioController extends Controller
{
    public function verTodosLosServicios(Request $req){
    
    $req = Session::get('mail');
        
        if (!empty($req)){
            $id = Persona::where('mail', $req)->first()->id;
            $persona = Persona::find($id);
        


    $buscador= array();


    $pracPers = Practica::where('nombre_practica', 'like', '%'.Input::get('buscador').'%')
                ->select('practicas.id', 'nombre_practica', 'personas.nombre', 'practicas.descripcion', 'personas.id', 'practicas.imagen_practica', 'practicas.id_practicante')
                ->join('personas', 'practicas.id_practicante', '=', 'personas.id')
                ->orderBy('practicas.id', 'desc')->get();
                $rubros = Rubro::All();
                $servicios = Servicio::all();
                
        return view('todosLosServicios')->with('buscador', $buscador)->with('servicios', $servicios)->with('rubros',$rubros)->with('pracPers',$pracPers)->with('persona',$persona);
    
        }

        else{

            

    $buscador= array();


    $pracPers = Practica::where('nombre_practica', 'like', '%'.Input::get('buscador').'%')
                ->select('practicas.id', 'nombre_practica', 'personas.nombre', 'practicas.descripcion', 'personas.id', 'practicas.imagen_practica', 'practicas.id_practicante')
                ->join('personas', 'practicas.id_practicante', '=', 'personas.id')
                ->orderBy('practicas.id', 'desc')->get();
                $rubros = Rubro::All();
                $servicios = Servicio::all();
                
            
            return view('todosLosServicios')->with('buscador', $buscador)->with('servicios', $servicios)->with('rubros',$rubros)->with('pracPers',$pracPers);
        }

    }

    /*public function verServiciosPorRubro($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::find($id_rubro);
        
        return view('/todosLosServicios')->with('servicios', $servicios)->with('rubros',$rubros);

        //dd($servicios);
    }*/

    public function verServicios(Request $req, $id_rubro){
        
        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);

        $servicios = Servicio::all();
        $rubros = Rubro::All();
        $ruId = Rubro::find($id_rubro);

        
        return view('/servicios')->with('servicios', $servicios)->with('rubros',$rubros)->with('ruId',$ruId)->with('persona',$persona);

        //dd($ruId);
    }

    public function verUsuariosServicios(Request $req, $id_servicio){

        $req = Session::get('mail');
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);

        $servicio = Servicio::find($id_servicio);
        $rubros = Rubro::All();
        $pracPers = DB::Select('Select * from practicas inner join personas on practicas.id_practicante = personas.id 
                                                        inner join servicios on practicas.id_servicio = servicios.id 
                                                        where servicios.id = '.$id_servicio.'');     

        return view('/usuariosPorServicio')->with('pracPers',$pracPers)->with('servicio',$servicio)->with('rubros',$rubros)->with('persona',$persona);

        //dd($pracPers);
    }

    public function irAWizard(Request $request){

        $id_rubro = array_key_exists('data', $_GET) ? $_GET['data'] : null;
        
        $req = Session::get('mail');
        
        $id = Persona::where('mail', $req)->first()->id;
        $persona = Persona::find($id);

        $practica = new Practica();
        $rubros = Rubro::all();
       // $servicios = Servicio::paginate(5);
        //$servicios = Servicio::where('id', $request->id)->pluck('id');
        
        if(!empty($id_rubro))
            $servicios = DB::Select('Select * from servicios where id_rubro = '.$id_rubro.'');
        else
            $servicios = Servicio::paginate(5);

        return view('/wizard')->with('rubros',$rubros)->with('servicios',$servicios)->with('practica',$practica)->with('persona',$persona);

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

   public function createPractica(Request $req){
 
        //$session_id = session()->getId();
        $req = Session::get('mail');
 
        if ( $req ){
            $servicioId = DB::table('personas')->where('mail', $req)->first()->id;
        
            $practica = new Practica();
            $practica->nombre_practica = Input::get('nombre_practica');
            $practica->precio = Input::get('precio');
            $practica->descripcion = Input::get('descripcion');
            $practica->imagen_practica = Input::get('imagen_practica');
            $practica->id_practicante = $servicioId;
            $practica->id_servicio = Input::get('id_servicio');
            $practica->save();
 
            $rubros = Rubro::all();
            $servicios = Servicio::All();
 
            $req = Session::get('mail');
        
            $id = Persona::where('mail', $req)->first()->id;
            $persona = Persona::find($id);
 
            //dd($practica);
            return Redirect::to('/wizard')->with('rubros',$rubros)->with('servicios',$servicios)->with('practica',$practica)->with('persona',$persona);
        }
    }

    
}
