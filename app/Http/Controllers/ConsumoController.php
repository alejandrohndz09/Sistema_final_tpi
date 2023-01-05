<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use Illuminate\Http\Request;

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
    public function index()
    {
        $consumos = Consumo::all();

        return view('consumo.index', compact('consumos'))
            ->with('i', (request()->input('page', 1) - 1) * $consumos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consumo = new Consumo();
        return view('consumo.create', compact('consumo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Consumo::$rules);

        $consumo = Consumo::create($request->all());

        return redirect()->route('consumos.index')
            ->with('success', 'Consumo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumo = Consumo::find($id);

        return view('consumo.show', compact('consumo'));
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

        return view('consumo.edit', compact('consumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consumo $consumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumo $consumo)
    {
        request()->validate(Consumo::$rules);

        $consumo->update($request->all());

        return redirect()->route('consumos.index')
            ->with('success', 'Consumo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consumo = Consumo::find($id)->delete();

        return redirect()->route('consumos.index')
            ->with('success', 'Consumo deleted successfully');
    }
}
