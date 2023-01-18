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
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona:: select('personas.idPersona','personas.nombre', 'personas.apellidos', 'personas.telefono', 'personas.idCanton','usuario.correo')
        ->join ('usuario','personas.idPersona','=','usuario.idPersona')
        -> where ('usuario.rol',1)
        ->get();
        
         return view('persona.index')->with('personas',$personas);
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


            $persona = new Persona();
            $persona->idPersona = $request->input('dui');
            $persona->nombre = $request->input('nombre');
            $persona->apellidos = $request->input('apellido');
            $persona->telefono = $request->input('telefono');
            $persona->idCanton = $request->input('canton');
            $persona->save();

        // $personas = new Persona();
        // Persona::create([
        //     'idPersona' => $request->input('dui'),
        //     'nombre' => $request->input('nombre'),
        //     'apellidos' => $request->input('apellido'),
        //     'telefono' => $request->input('telefono'),
        //     'idCanton' => $request->input('canton')
        // ]);
        
            $aleatorio = rand(0, 100000);
            $temp = explode(" ", $request->input('apellido'));
            $c = '';
            $c2 = '';
        if (count($temp) > 1) {
            $c = strtoupper($temp[0][0]);
            $c2 = strtoupper($temp[1][0]);
        } else {
            $c = strtoupper($temp[0][0]);
            $c2 = strtoupper($temp[0][1]);
        }

        $n = $c;
        $n2 = $c2;
        validar($aleatorio);
        $valor = $n . "" . $n2 . "" . strval(validar($aleatorio));

        $usuario = new Usuario();
        $usuario->idUsuario = $valor;
        $usuario->correo = $request->input('correo');
        $usuario->contraseña = $request->input('contra');   
        $usuario->rol = 1;  
        $usuario->idPersona = $request->input('dui');
        $usuario->save();

        // Usuario::create([
        //     'idUsuario' => $valor,
        //     'correo' => $request->input('correo'),
        //     'contraseña' => $request->input('contra'),
        //     'rol' => 1,
        //     'idPersona' => $request->input('dui')
        // ]);

            $alert = array(
                'type' => 'success',
                'message' =>'El registro se ha guardado exitosamente'
            );
            
            session()->flash('alert',$alert);
            
            return  view('persona.index')->with('persona',$persona);
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


