<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Persona;
use App\Rubro;
use App\Servicio;
use App\Practica;
use App\PersonasServicios;
use App\Curriculum;
use App\Evidencias;
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

class PerfilController extends Controller
{
	public function perfil($id){
		$rubros = Rubro::all();
		$persona = Persona::where('id', $id)->first();
		$curriculum = Curriculum::where('id_persona', $id)->first();
		$practicas = Practica::where('id_practicante', "=", $id)->get();

        $calificacionescomentarios =  DB::table('evidencias')
                                        ->where('id_destinatario', '=', $id)
                                        ->avg('calificacion');

        $calificacionEstrella = round($calificacionescomentarios, 1);

        $comentarios =  DB::table('evidencias')
                            ->where('id_destinatario', '=', $id)
                            ->select('comentario', 'calificacion', 'created_at')
                            ->get();


        return view('perfil')->with('rubros', $rubros)->with('persona', $persona)->with('calificacionescomentarios', $calificacionescomentarios)->with('comentarios', $comentarios)->with('curriculum', $curriculum)->with('practicas', $practicas)->with('calificacionEstrella', $calificacionEstrella);

        /*$evidencias = DB::table('practicas')
            ->leftjoin('evidencias', 'evidencias.id_practica', '=', 'practicas.id')
            //->join()
			//->select('evidencias.id as id_evidencia', 'pathevidencia', 'evidencia_descripcion', 'id_practicante')
			->where('practicas.id_practicante', '=', $id)
			->get();
        
			return view('perfil')->with('rubros', $rubros)->with('persona', $persona);//->with('evidencias', $evidencias);*/

        //dd($calificacion);
    }

		public function editarPerfil($id) {
			$rubros = Rubro::all();
			$persona = Persona::where('id', $id)->first();

			return view('editarPerfil')->with('rubros', $rubros)->with('persona', $persona);
		}

		public function edit($id, Request $request){

			$this->validate($request, [
        		'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
    		]);
			$rubros = Rubro::all();
			$persona = Persona::where('id', $id)->first();
			$curriculum_persona = Curriculum::where('id_persona', $id)->first();

			$persona->nombre = Input::get('nombre');
			$persona->apellido = Input::get('apellido');
			$persona->mail = Input::get('mail');
			$persona->provincia = Input::get('provincia');
			$persona->pais = Input::get('pais');
			$persona->telefono = Input::get('telefono');
			$persona->zona = Input::get('zona');
			$persona->descripcion = Input::get('descripcion');

			if($request->hasFile('img')){ 
				$image = $request->file('img'); 
				$fileName = $image->getClientOriginalName();
				$fileExtension = $image->getClientOriginalExtension();
				$imageName = 'img_perfil_'.$persona->id.'.'.$image->getClientOriginalExtension();
				$image->move(base_path().'/public/img/perfil/', $imageName);
				$persona->img = 'img/perfil/'.$imageName;
			}
			
			$persona->save();

        if (empty($curriculum->formacion_academica)){
            $curriculum = new Curriculum();
            $curriculum->id_persona = $id;
        }

        $curriculum->formacion_academica = Input::get('formacion_academica');
        $curriculum->formacion_complementaria = Input::get('formacion_complementaria');
        $curriculum->experiencia = Input::get('experiencia');
        $curriculum->idiomas = Input::get('idiomas');
        $curriculum->referencias = Input::get('referencias');
        $curriculum->otros_datos = Input::get('otros_datos');
        

        $curriculum->save();

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
