<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Session;
use App\Persona;

class RubroController extends Controller
{
    public function verRubrosYServicios(){
    	$req = Session::get('mail');
        
        if (!empty($req)){
            
            $id = Persona::where('mail', $req)->first()->id;
            $persona = Persona::find($id);

	        $rubros = Rubro::all();
	        $servicios = Servicio::all();

        return view('/rubrosYServicios')->with('rubros', $rubros)->with('servicios', $servicios)->with('persona',$persona);
    	}

    	else{

    		$rubros = Rubro::all();
        	$servicios = Servicio::all();

    		return view('/rubrosYServicios')->with('rubros', $rubros)->with('servicios', $servicios);
    	}
    }
}
