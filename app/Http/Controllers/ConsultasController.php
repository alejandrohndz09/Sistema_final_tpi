<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\Medidor;
use App\Models\Consumo;
use Illuminate\Http\Request;

/**
 * Class ConsultasController
 * @package App\Http\Controllers
 */
class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumo = Consumo:: select('canton.nombre','monto')
        ->join ('medidores','medidores.idMedidores','=','consumo.idMedidores')
        ->join ('canton','canton.idCanton','=','medidores.idCanton')
        -> where ('consumo.estado','cancelado')
        ->get();
        
         return view('consultas.montoTotal')->with('consumo',$consumo);
    }

}


