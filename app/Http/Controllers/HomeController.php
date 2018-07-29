<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Persona;
use App\Rubro;
use App\Servicio;
use App\Practica;
use App\CalificacionComentario;
use App\PersonasServicios;
use App\Curriculum;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session; 

class HomeController extends Controller
{
    private $path = 'persona';

    public function index(){

        $rubros = Rubro::all();
        $servicios = Servicio::paginate(4);
        $rubroPorId = Rubro::where('id', '=', Input::get('id'));
        $rubrosYServicios = Servicio::where($servicios.'id_rubro', '=', $rubros.'id');
        $serviciosPorRubro = Servicio::where($servicios.'id_rubro', '=', $rubros.'id');
        /*$pracPers = DB::Select('Select practicas.id id_practica, nombre_practica, personas.nombre, practicas.descripcion, 
                                personas.id id_persona, practicas.imagen_practica, practicas.precio  
                                from personas inner join practicas on personas.id = practicas.id_practicante limit 6');*/

        $pracPers = DB::table('personas')
                    ->join('practicas', 'practicas.id_practicante', '=', 'personas.id')
                    ->select('practicas.id as id_practica', 'nombre_practica', 'personas.nombre', 'practicas.descripcion', 
                                'personas.id as id_persona', 'practicas.imagen_practica', 'practicas.precio')
                    ->limit(6)
                    ->get();
        
        $req = Session::get('mail');
        
        if (!empty($req)){
            $id = Persona::where('mail', $req)->first()->id;
            $user = Persona::find($id);
        

        return view('/index')->with('rubros', $rubros)->with('servicios', $servicios)->with('rubroPorId', $rubroPorId)->with('rubrosYServicios', $rubrosYServicios)->with('pracPers',$pracPers)->with('user', $user);
        }

        else{
            return view('/index')->with('rubros', $rubros)->with('servicios', $servicios)->with('rubroPorId', $rubroPorId)->with('rubrosYServicios', $rubrosYServicios)->with('pracPers',$pracPers);   
        }
        //dd($pracPers);
    }

    protected $redirectTo = '/index';

    public function registro(){
       $rubros = Rubro::all();
       
       return View::make('registro')->with('rubros', $rubros);
   }

   public function create(){

    $persona = new Persona();
    $persona->nombre = Input::get('nombre');
    $persona->apellido = Input::get('apellido');
    $persona->mail = Input::get('mail');
    $persona->provincia = Input::get('provincia');
    $persona->zona = Input::get('zona');
    $persona->pais = Input::get('pais');
    $persona->img = Input::get('img');
    $persona->password = Input::get('contrasena');
    $persona->telefono = Input::get('telefono');
    $persona->save();
    $curriculum = new Curriculum();
    $curriculum->id_persona = $persona->id;
    $curriculum->save();
    return Redirect::to('/inicioSesion')->with('notice', 'El usuario ha sido creado correctamente, Inicie Sesión');
}

public function inicioSesion(){

    $rubros = Rubro::all();
    return view('inicioSesion')->with('rubros', $rubros);
}

public function login(Request $req){

    $mail = $req->input('mail');
    $password = $req->input('contrasena');

    $checkLogin = DB::table('personas')->where(['mail'=>$mail,'password'=>$password])
    ->get();

    if(count($checkLogin) > 0) {

            //Si encuentro un mail, lo meto en una variable de sesion
        $req->session()->put('mail', $mail);
            session(['mail' => $mail]); //usando el helper
            
            return Redirect::to('/index');
        }
        else {
            // echo "Login Failed!";
            return Redirect::to('/inicioSesion');
        }
                // attempt to do the login


    }

    public function logout(Request $req) {
      $req->session()->flush();
      return redirect('/index');
  }

}