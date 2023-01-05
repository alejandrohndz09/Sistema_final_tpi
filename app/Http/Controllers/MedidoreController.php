<?php

namespace App\Http\Controllers;

use App\Models\Medidore;
use Illuminate\Http\Request;

/**
 * Class MedidoreController
 * @package App\Http\Controllers
 */
class MedidoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidores = Medidore::all();

        return view('medidores.index', compact('medidores'))
            ->with('i', (request()->input('page', 1) - 1) * $medidores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidore = new Medidore();
        return view('medidores.create', compact('medidore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medidore::$rules);

        $medidore = Medidore::create($request->all());

        return redirect()->route('medidores.index')
            ->with('success', 'Medidore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medidore = Medidore::find($id);

        return view('medidores.show', compact('medidore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medidore = Medidore::find($id);

        return view('medidores.edit', compact('medidore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Medidore $medidore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medidore $medidore)
    {
        request()->validate(Medidore::$rules);

        $medidore->update($request->all());

        return redirect()->route('medidores.index')
            ->with('success', 'Medidore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $medidore = Medidore::find($id)->delete();

        return redirect()->route('medidores.index')
            ->with('success', 'Medidore deleted successfully');
    }
}
