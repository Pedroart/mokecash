<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use App\Http\Requests\TiendaRequest;

/**
 * Class TiendaController
 * @package App\Http\Controllers
 */
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendas = Tienda::all();

        return view('tienda.index', compact('tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tienda = new Tienda();
        return view('tienda.create', compact('tienda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiendaRequest $request)
    {
        Tienda::create($request->validated());

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.show', compact('tienda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.edit', compact('tienda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiendaRequest $request, Tienda $tienda)
    {
        $tienda->update($request->validated());

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda updated successfully');
    }

    public function destroy($id)
    {
        Tienda::find($id)->delete();

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda deleted successfully');
    }
}
