<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consumo;
use App\Models\Medidor;

use Dompdf\Dompdf;

class InformeController extends Controller
{
    public function generatePDF(){
        $consumos = Consumo::where('idMedidores',$id)->orderby('fecha_a_facturar','desc')->get();
        $medidor=Medidor::find(61);
        $pdf = Dompdf::loadView('consumo/informe.pdf', ['consumos' => $consumos,'medidor'=>$medidor]);

        return $pdf->download('consumo/informe.pdf');
    }
}
