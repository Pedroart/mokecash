<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Http\Requests\CotizacionRequest;

/**
 * Class CotizacionController
 * @package App\Http\Controllers
 */
class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cotizacions = Cotizacion::all();

        return view('cotizacion.index', compact('cotizacions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cotizacion = new Cotizacion();
        return view('cotizacion.create', compact('cotizacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CotizacionRequest $request)
    {
        Cotizacion::create($request->validated());

        return redirect()->route('cotizacions.index')
            ->with('success', 'Cotizacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cotizacion = Cotizacion::find($id);

        return view('cotizacion.show', compact('cotizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::find($id);

        return view('cotizacion.edit', compact('cotizacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CotizacionRequest $request, Cotizacion $cotizacion)
    {
        $cotizacion->update($request->validated());

        return redirect()->route('cotizacions.index')
            ->with('success', 'Cotizacion updated successfully');
    }

    public function destroy($id)
    {
        Cotizacion::find($id)->delete();

        return redirect()->route('cotizacions.index')
            ->with('success', 'Cotizacion deleted successfully');
    }
}
