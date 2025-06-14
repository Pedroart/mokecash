<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Http\Requests\ArchivoRequest;
use App\Http\Requests\StoreArchivoRequest;

/**
 * Class ArchivoController
 * @package App\Http\Controllers
 */
class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivos = Archivo::all();

        return view('archivo.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $archivo = new Archivo();
        return view('archivo.create', compact('archivo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArchivoRequest $request)
    {
        Archivo::create($request->validated());

        return redirect()->route('archivos.index')
            ->with('success', 'Archivo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $archivo = Archivo::find($id);

        return view('archivo.show', compact('archivo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $archivo = Archivo::find($id);

        return view('archivo.edit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArchivoRequest $request, Archivo $archivo)
    {
        $archivo->update($request->validated());

        return redirect()->route('archivos.index')
            ->with('success', 'Archivo updated successfully');
    }

    public function destroy($id)
    {
        Archivo::find($id)->delete();

        return redirect()->route('archivos.index')
            ->with('success', 'Archivo deleted successfully');
    }
}
