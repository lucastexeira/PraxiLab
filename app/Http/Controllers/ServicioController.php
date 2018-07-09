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
    public function verTodosLosServicios(){

        $buscador = Servicio::where('nombre_servicio', 'like', '%'.Input::get('buscador').'%')
                    //->orWhere('body', 'like', '%'.Input::get('buscador').'%')
                    ->orderBy('id', 'desc')->paginate(8);
                    $rubros = Rubro::All();
                    $servicios = Servicio::all();
        
        return view('/todosLosServicios')->with('buscador', $buscador)->with('servicios', $servicios)->with('rubros',$rubros);
    }

    public function verServiciosPorRubro($id_rubro){

        $servicios = Servicio::all();
        $rubros = Rubro::find($id_rubro);
        
        return view('/todosLosServicios')->with('servicios', $servicios)->with('rubros',$rubros);

        //dd($servicios);
    }

    public function verUsuariosServicios($id_servicio){

        $servicios = Servicio::all();
        /*$ru = Rubro::all();
        $rubros = Rubro::find($id_rubro);
        $serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $ru.'id');*/

        //return view('/servicios')->with('servicios', $servicios)->with('serviciosPorRubro',$serviciosPorRubro)->with('rubros',$rubros)->with('ru',$ru);

        dd($servicios);
    }

    public function adquirirServicio(){

        $rubros = Rubro::all();
        
        return view('/wizard')->with('rubros',$rubros);

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
        $servicios = Servicio::where('id_rubro',1)->pluck('id');

        return view('/abmPractica')->with('rubros',$rubros)->with('servicios',$servicios);

        //dd($servicios);
    }

    
}
