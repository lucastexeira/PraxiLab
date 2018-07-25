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
        $pracPers = DB::Select('Select practicas.id id_practica, nombre_practica, personas.nombre, practicas.descripcion, personas.id id_persona, practicas.imagen_practica from personas
                                        inner join practicas on personas.id = practicas.id_practicante limit 6');
                                        
        return view('/index')->with('rubros', $rubros)->with('servicios', $servicios)->with('rubroPorId', $rubroPorId)->with('rubrosYServicios', $rubrosYServicios)->with('pracPers',$pracPers);

        //dd($pracPers);
    }
 
    protected $redirectTo = '/index';

     public function registro(){
         $persona = new Persona();
         $rubros = Rubro::all();
     return View::make('registro')->with('persona', $persona)->with('rubros', $rubros);
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
 
        return Redirect::to('/inicioSesion')->with('notice', 'El usuario ha sido creado correctamente, Inicie Sesión');
    }

    public function edit($id){
        $rubros = Rubro::all();
        $persona = Persona::where('id', $id)->first();
        $curriculum_persona = Persona::where('id_persona', $id);

        $persona->nombre = Input::get('nombre');
        $persona->apellido = Input::get('apellido');
        $persona->mail = Input::get('mail');
        $persona->provincia = Input::get('provincia');
        $persona->pais = Input::get('pais');
        $persona->telefono = Input::get('telefono');
        $persona->save();

        return $this->perfil($persona->id);
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

    public function perfil($id){
        $rubros = Rubro::all();
        $persona= Persona::where('id', $id)->first();

        $calificacionescomentarios =  DB::table('calificacionescomentarios')
                                        ->where('id_destinatario', '=', $id)
                                        ->avg('calificacion');

        $comentarios =  DB::table('calificacionescomentarios')
                            ->where('id_destinatario', '=', $id)
                            ->select('comentario', 'calificacion', 'created_at')
                            ->get();


        return view('perfil')->with('rubros', $rubros)->with('persona', $persona)->with('calificacionescomentarios', $calificacionescomentarios)->with('comentarios', $comentarios);
        //dd($calificacionescomentarios);
        /*$persona = Persona::where('id', $id)->first();
        $curriculum = Curriculum::where('id_persona', $id)->first();
        $practicas = Practica::where('id_practicante', "=", $id)->get();
        
        return view('perfil')->with('rubros', $rubros)->with('persona', $persona)->with('curriculum', $curriculum)->with('practicas', $practicas);*/
    }

    public function editarPerfil($id) {
        $rubros = Rubro::all();
        $persona = Persona::where('id', $id)->first();
        
        return view('editarPerfil')->with('rubros', $rubros)->with('persona', $persona);
    }

    public function editarCurriculum($id) {
        $rubros = Rubro::all();
        $curriculum = Curriculum::where('id_persona', $id)->first();
        $persona = Persona::where('id', $id)->first();
        
        return view('editarCurriculum')->with('rubros', $rubros)->with('curriculum', $curriculum)->with('persona', $persona);
    }

    public function editCurriculum($id){
        $rubros = Rubro::all();
        $curriculum = Curriculum::where('id_persona', $id)->first();
        $persona = Persona::where('id', $id)->first();

        $curriculum->formacion_academica = Input::get('formacion_academica');
        $curriculum->formacion_complementaria = Input::get('formacion_complementaria');
        $curriculum->experiencia = Input::get('experiencia');
        $curriculum->idiomas = Input::get('idiomas');
        $curriculum->referencias = Input::get('referencias');
        $curriculum->otros_datos = Input::get('otros_datos');
        $curriculum->save();

        return $this->perfil($persona->id);
    }

}