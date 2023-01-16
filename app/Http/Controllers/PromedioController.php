<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\Medidor;
use App\Models\Consumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PromedioController
 * @package App\Http\Controllers
 */
class PromedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consumo = DB::table('consumo')
            ->select('canton.nombre', DB::raw('AVG(lectura_actual) as lectura'))
            ->join ('medidores','medidores.idMedidores','=','consumo.idMedidores')
            ->join ('canton','canton.idCanton','=','medidores.idCanton')
            ->groupBy('canton.nombre')
            ->get();
        
         return view('consultas.promedio')->with('consumo',$consumo);
    }

    
}


