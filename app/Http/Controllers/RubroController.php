<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rubro;
use App\Servicio;
use Illuminate\Http\Request;
use App\Http\Requests;
use Exception;

class RubroController extends Controller
{
    public function verRubrosYServicios(){

        $rubros = Rubro::all();
        $servicios = Servicio::all();

        return view('/rubrosYServicios')->with('rubros', $rubros)->with('servicios', $servicios);
    }
}
