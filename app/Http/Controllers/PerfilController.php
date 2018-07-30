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
	public function perfil(Request $req, $id_usuario){
		
		$rubros = Rubro::all();

		$req = Session::get('mail');
		$persona = Persona::where('mail', $req)->first();
		
		$personaAtributos = Persona::where('id', $id_usuario)->first();

		$curriculum = Curriculum::where('id_persona', $id_usuario)->first();
		$practicas = Practica::where('id_practicante', "=", $id_usuario)->get();

		$calificacionescomentarios =  DB::table('evidencias')
		->where('id_destinatario', '=', $id_usuario)
		->avg('calificacion');

		$calificacionEstrella = round($calificacionescomentarios, 1);

		$comentarios =  DB::table('evidencias')
						->join('historial_practicas','historial_practicas.id','=','evidencias.id_historial_practica')
						->join('personas','personas.id','=','evidencias.id_autor')
						->select('historial_practicas.created_at','id_autor','username','id_historial_practica','comentario','calificacion')
						->where('id_destinatario', '=', $id_usuario)
						->where('historial_practicas.id_estado', '=', 4)
						->get();

		$experiencia = DB::table('historial_practicas')
		->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
		->join('evidencias', 'evidencias.id_historial_practica', '=', 'historial_practicas.id')
		->Where('historial_practicas.id_estado', 4)
		->Where('evidencias.id_autor', $id_usuario)
		->get();
		
		$usuarios = DB::table('personas')->get();

		$CantidadPracticasPracticante = DB::table('historial_practicas')
                                            ->join('practicas', 'practicas.id', '=', 'historial_practicas.id_practica')
                                            ->where('practicas.id_practicante', '=', $id_usuario)
                                            ->where('historial_practicas.id_estado' ,'=' ,4)
                                            ->count('historial_practicas.id');
        
        $CantidadPracticasVoluntario = DB::table('historial_practicas')
                                            ->where('historial_practicas.id_voluntario', '=', $id_usuario)
                                            ->where('historial_practicas.id_estado' ,'=' ,4)
                                            ->count('historial_practicas.id');

		//dd($comentarios);
		
		return view('perfil')->with('rubros', $rubros)->with('persona', $persona)->with('calificacionescomentarios', $calificacionescomentarios)
		->with('comentarios', $comentarios)->with('curriculum', $curriculum)->with('practicas', $practicas)
		->with('personaAtributos', $personaAtributos)
		->with('calificacionEstrella', $calificacionEstrella)->with('experiencia', $experiencia)->with('usuarios', $usuarios)
		->with('CantidadPracticasPracticante',$CantidadPracticasPracticante)
		->with('CantidadPracticasVoluntario',$CantidadPracticasVoluntario);
		//dd($usuarios);
        /*$evidencias = DB::table('practicas')
            ->leftjoin('evidencias', 'evidencias.id_practica', '=', 'practicas.id')
            //->join()
			//->select('evidencias.id as id_evidencia', 'pathevidencia', 'evidencia_descripcion', 'id_practicante')
			->where('practicas.id_practicante', '=', $id)
			->get();
        
			return view('perfil')->with('rubros', $rubros)->with('persona', $persona);//->with('evidencias', $evidencias);*/

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

			return redirect()->action(
                'PerfilController@perfil', ['perfil' => $id]
            );
		}

		public function editarCurriculum(Request $req, $id) {
			$rubros = Rubro::all();
			$curriculum = Curriculum::where('id_persona', $id)->first();
			$req = Session::get('mail');
			$id_usuario = Persona::where('mail', $req)->first()->id;
			
			$persona = Persona::where('id', $id_usuario)->first();

			return view('editarCurriculum')->with('rubros', $rubros)->with('curriculum', $curriculum)->with('persona', $persona);
		}

		public function editCurriculum($id){
			$rubros = Rubro::all();
			$curriculum = Curriculum::where('id_persona', $id)->first();
			$persona = Persona::where('id', $id)->first();

			if($curriculum == null){
				
				$newCurriculum = new Curriculum();
				
				$newCurriculum->formacion_academica = Input::get('formacion_academica');
				$newCurriculum->formacion_complementaria = Input::get('formacion_complementaria');
				$newCurriculum->experiencia = Input::get('experiencia');
				$newCurriculum->idiomas = Input::get('idiomas');
				$newCurriculum->referencias = Input::get('referencias');
				$newCurriculum->otros_datos = Input::get('otros_datos');
				$newCurriculum->id_persona = $persona->id;
				$newCurriculum->save();

				return redirect()->action(
					'PerfilController@perfil', ['perfil' => $id]
				);
		
			}

			$curriculum->formacion_academica = Input::get('formacion_academica');
			$curriculum->formacion_complementaria = Input::get('formacion_complementaria');
			$curriculum->experiencia = Input::get('experiencia');
			$curriculum->idiomas = Input::get('idiomas');
			$curriculum->referencias = Input::get('referencias');
			$curriculum->otros_datos = Input::get('otros_datos');
			$curriculum->save();

			return redirect()->action(
                'PerfilController@perfil', ['perfil' => $id]
            );
		}
	}
