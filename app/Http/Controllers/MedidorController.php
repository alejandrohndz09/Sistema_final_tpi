<?php

namespace App\Http\Controllers;

use App\Models\Medidor;
use Illuminate\Http\Request;

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
        $medidores = Medidor::orderby('idCanton','desc')->get();

        return view('medidor.index')->with('medidores',$medidores);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidore = new Medidor();
        return view('medidor.create', compact('medidor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medidor::$rules);

        $medidore = Medidor::create($request->all());

        return redirect()->route('medidor.index')
            ->with('success', 'Medidor created successfully.');
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

        return view('medidor.show', compact('medidore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medidore = Medidor::find($id);

        return view('medidor.edit', compact('medidore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medidor $medidore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medidor $medidore)
    {
        request()->validate(Medidor::$rules);

        $medidore->update($request->all());

        return redirect()->route('medidor.index')
            ->with('success', 'Medidor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medidore = Medidor::find($id)->delete();

        return redirect()->route('medidor.index')
            ->with('success', 'Medidor deleted successfully');
    }
}
