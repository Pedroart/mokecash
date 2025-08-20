<?php

namespace App\Http\Controllers;

use App\Models\SeleccionesUsuario;
use App\Http\Requests\SeleccionesUsuarioRequest;

/**
 * Class SeleccionesUsuarioController
 * @package App\Http\Controllers
 */
class SeleccionesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seleccionesUsuarios = SeleccionesUsuario::all();

        return view('selecciones-usuario.index', compact('seleccionesUsuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seleccionesUsuario = new SeleccionesUsuario();
        return view('selecciones-usuario.create', compact('seleccionesUsuario'));
    }

    public function storeApi(SeleccionesUsuarioRequest $request)
    {
        SeleccionesUsuario::create($request->validated());

        return response(['success' => true], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeleccionesUsuarioRequest $request)
    {
        SeleccionesUsuario::create($request->validated());

        return redirect()->route('selecciones-usuarios.index')
            ->with('success', 'SeleccionesUsuario created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $seleccionesUsuario = SeleccionesUsuario::find($id);

        return view('selecciones-usuario.show', compact('seleccionesUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seleccionesUsuario = SeleccionesUsuario::find($id);

        return view('selecciones-usuario.edit', compact('seleccionesUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeleccionesUsuarioRequest $request, SeleccionesUsuario $seleccionesUsuario)
    {
        $seleccionesUsuario->update($request->validated());

        return redirect()->route('selecciones-usuarios.index')
            ->with('success', 'SeleccionesUsuario updated successfully');
    }

    public function destroy($id)
    {
        SeleccionesUsuario::find($id)->delete();

        return redirect()->route('selecciones-usuarios.index')
            ->with('success', 'SeleccionesUsuario deleted successfully');
    }
}
