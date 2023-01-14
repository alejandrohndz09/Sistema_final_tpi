<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use Illuminate\Http\Request;
use Redirect,Response;
/**
 * Class CantonController
 * @package App\Http\Controllers
 */
class CantonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantones = Canton::all();

        return view('canton.index')->with('cantones',$cantones);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canton = new Canton();
        return view('canton.form')->with('canton', $canton);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            Canton::create([
                'nombre' => $request->input('nombre'),
            ]);            
            $cantones = Canton::all();
            
            $alert = array(
                'type' => 'success',
                'message' =>'El registro se ha guardado exitosamente'
            );
            
            session()->flash('alert',$alert);
            
            return  view('canton.index')->with('cantones',$cantones);

    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cantone = Canton::find($id);

        session()->flash('canton',$canton);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $canton = Canton::find($id);
        return Response::json($canton);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Canton $cantone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $canton = Canton::find( $request->get('id-e'));
        $canton->nombre = $request->get('nombre-e');
        $canton->save();
        $cantones = Canton::all();
            
        $alert = array(
            'type' => 'success',
            'message' =>'El registro se ha actualizado exitosamente'
        );
        
        session()->flash('alert',$alert);
        
        return  redirect('/canton');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $canton = Canton::find($id)->delete();
        $alert = array(
            'type' => 'success',
            'message' =>'El registro se ha eliminado exitosamente'
        );
        
        session()->flash('alert',$alert);
        return redirect()->route('canton.index');;
    }
}