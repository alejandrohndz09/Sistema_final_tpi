<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\Medidor;
use App\Models\Consumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ResumenController
 * @package App\Http\Controllers
 */
class ResumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{

    $consumo = DB::table('consumo')
        ->select('medidores.idMedidores',  'personas.nombre', 'personas.apellidos', 'consumo.monto',)
        ->join ('medidores','medidores.idMedidores','=','consumo.idMedidores')
        ->join ('personas','personas.idPersona','=','medidores.idPersona')
        ->where('estado','pagado')
        ->get();
     return view('consultas.resumen')->with('consumo',$consumo);
}

    
}


