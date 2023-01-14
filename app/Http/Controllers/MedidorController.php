<?php

namespace App\Http\Controllers;

use App\Models\Medidor;
use Illuminate\Http\Request;
use Redirect,Response;
/**
 * Class MedidorController
 * @package App\Http\Controllers
 */
class MedidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidores = Medidor::where('idCanton',8)->orderby('idCanton','desc')->get();

        return view('medidor.index')->with('medidores',$medidores);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidor = new Medidor();
        return view('medidor.form')->with('medidor', $medidor);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
                Medidor::create([
                'idPersona' => $request->input('persona'),
                'idCanton' => $request->input('canton'),
                'ruta' => $request->input('ruta'),
                'referencia' => $request->input('referencia')
            ]);            
            $medidores = Medidor::where('idCanton',8)->orderby('idCanton','desc')->get();
            
            $alert = array(
                'type' => 'success',
                'message' =>'El registro se ha guardado exitosamente'
            );
            
            session()->flash('alert',$alert);
            
            return  view('medidor.index')->with('medidores',$medidores);

    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medidore = Medidor::find($id);

        session()->flash('medidor',$medidor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medidor = Medidor::find($id);
        return Response::json($medidor);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medidor $medidore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $medidor = Medidor::find( $request->get('id-e'));
        $medidor->idPersona = $request->get('persona-e');
        $medidor->idCanton = $request->get('canton-e');
        $medidor->ruta = $request->get('ruta-e');
        $medidor->referencia = $request->get('referencia-e');
        $medidor->save();
        $medidores = Medidor::where('idCanton',8)->orderby('idCanton','desc')->get();
            
        $alert = array(
            'type' => 'success',
            'message' =>'El registro se ha actualizado exitosamente'
        );
        
        session()->flash('alert',$alert);
        
        return  redirect('/medidor');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medidore = Medidor::find($id)->delete();
        $alert = array(
            'type' => 'success',
            'message' =>'El registro se ha eliminado exitosamente'
        );
        
        session()->flash('alert',$alert);
        return redirect()->route('medidor.index');;
    }
}