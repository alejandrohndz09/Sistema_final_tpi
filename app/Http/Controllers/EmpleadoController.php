<?php

namespace App\Http\Controllers;

use App\Models\Canton;
use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

/**
 * Class PersonaController
 * @package App\Http\Controllers
 */
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Persona:: select('personas.idPersona','personas.nombre', 'personas.apellidos', 'personas.telefono', 'personas.idCanton','usuario.correo')
        ->join ('usuario','personas.idPersona','=','usuario.idPersona')
        -> where ('usuario.rol',0)
        ->get();
        
         return view('persona.index')->with('personas',$empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = new Persona();
        $canton = Canton::pluck('nombre', 'idCanton');
        return view('persona.create', compact('persona','canton'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate(Persona::$rules);

        $persona = Persona::create($request->all());

        return redirect()->route('persona.index')
            ->with('success', 'Persona created successfully.');*/

        Persona::create([
            'dui' => $request->input('dui'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'telefono' => $request->input('telefono'),
            'idCanton' => $request->input('canton'),
            'correo' => $request->input('correo')
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);

        return view('persona.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        $canton = Canton::pluck('nombre', 'idCanton');
        return view('persona.edit', compact('persona','canton'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Persona $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        request()->validate(Persona::$rules);

        $persona->update($request->all());

        return redirect()->route('persona.index')
            ->with('success', 'Persona updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $persona = Persona::find($id)->delete();

        return redirect()->route('persona.index')
            ->with('success', 'Persona deleted successfully');
    }
}


