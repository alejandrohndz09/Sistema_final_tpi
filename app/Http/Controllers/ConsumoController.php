<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Medidor;
use Illuminate\Http\Request;
use Redirect,Response;
/**
 * Class ConsumoController
 * @package App\Http\Controllers
 */
class ConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexMedidor(){
        if(session()->has('usuario')){
            $medidores = Medidor::where('idPersona',session()->get('usuario')->idPersona)->get();
        }
        return view('consumo.index-medidor')->with('medidores',$medidores);
    }


    public function listByMedidor($id){
        $consumos = Consumo::where('idMedidores',$id)->orderby('fecha_a_facturar','desc')->get();
        $medidor=Medidor::find($id);
        return view('consumo.index')->with('consumos',$consumos)->with('medidor',$medidor);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consumo = new Consumo();
        return view('consumo.form')->with('consumo', $consumo);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
                Consumo::create([
                'idPersona' => $request->input('persona'),
                'idCanton' => $request->input('canton'),
                'ruta' => $request->input('ruta'),
                'referencia' => $request->input('referencia')
            ]);            
            $consumos = Consumo::where('idCanton',8)->orderby('idCanton','desc')->get();
            
            $alert = array(
                'type' => 'success',
                'message' =>'El registro se ha guardado exitosamente'
            );
            
            session()->flash('alert',$alert);
            
            return  view('consumo.index')->with('consumos',$consumos);

    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumoe = Consumo::find($id);

        session()->flash('consumo',$consumo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumo = Consumo::find($id);
        return Response::json($consumo);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consumo $consumoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $consumo = Consumo::find( $request->get('id-e'));
        $consumo->idPersona = $request->get('persona-e');
        $consumo->idCanton = $request->get('canton-e');
        $consumo->ruta = $request->get('ruta-e');
        $consumo->referencia = $request->get('referencia-e');
        $consumo->save();
        $consumos = Consumo::where('idCanton',8)->orderby('idCanton','desc')->get();
            
        $alert = array(
            'type' => 'success',
            'message' =>'El registro se ha actualizado exitosamente'
        );
        
        session()->flash('alert',$alert);
        
        return  redirect('/consumo');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consumoe = Consumo::find($id)->delete();
        $alert = array(
            'type' => 'success',
            'message' =>'El registro se ha eliminado exitosamente'
        );
        
        session()->flash('alert',$alert);
        return redirect()->route('consumo.index');;
    }
}