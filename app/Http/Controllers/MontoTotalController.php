<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\Medidor;
use App\Models\Consumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class MontoTotalController
 * @package App\Http\Controllers
 */
class MontoTotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$consumo = Consumo:: select('canton.nombre','consumo.monto')
        ->join ('medidores','medidores.idMedidores','=','consumo.idMedidores')
        ->join ('canton','canton.idCanton','=','medidores.idCanton')
        -> where ('consumo.estado','cancelado')
        ->get();*/

        $consumo = DB::table('consumo')
            ->select('canton.nombre', DB    ::raw('SUM(monto) as total'))
            ->join ('medidores','medidores.idMedidores','=','consumo.idMedidores')
            ->join ('canton','canton.idCanton','=','medidores.idCanton')
            ->where('estado','cancelado')
            ->groupBy('canton.nombre')
            ->get();
        
         return view('consultas.montoTotal')->with('consumo',$consumo);
    }

    public function Chart()
    {
       // $tableconsumo = Consumo::all();
        /* $datos = DB::table('consumo')
            ->select('canton.nombre', DB::raw('SUM(monto) as total'))
            ->join ('medidores','medidores.idMedidores','=','consumo.idMedidores')
            ->join ('canton','canton.idCanton','=','medidores.idCanton')
            ->where('estado','cancelado')
            ->groupBy('canton.nombre')
            ->get();
        
            $datosMostar = [];
            foreach ($datos as $consumo){
            $datosMostar[] =['name' =>$consumo['canton.nombre'],'y'=>floatval($consumo['total'])];
            }
         return view('consultas.montoTotal',['data' => json_encode($datosMostar)]); */

         $datos = Consumo :: all();
        
            $datosMostar = [];
            foreach ($datos as $consumo){
            $datosMostar[] =['name' =>$consumo['canton.nombre'],'y'=>floatval($consumo['total'])];
            }
         return view('consultas.montoTotal',['data' => json_encode($datosMostar)]);
    }
    
}


