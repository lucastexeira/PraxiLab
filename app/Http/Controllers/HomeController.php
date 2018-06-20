<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

	public function index(){

		$personas = Persona::get();

        return view('index')->with(['personas' => $personas]);
    }

	public function registro(){
        return view('registro');
    }

    public function inicioSesion(){
        return view('inicioSesion');
    }
}
