<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Http\Requests\BoletaRequest;

/**
 * Class BoletaController
 * @package App\Http\Controllers
 */
class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boletas = Boleta::all();

        return view('boleta.index', compact('boletas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $boleta = new Boleta();
        return view('boleta.create', compact('boleta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoletaRequest $request)
    {
        Boleta::create($request->validated());

        return redirect()->route('boletas.index')
            ->with('success', 'Boleta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $boleta = Boleta::find($id);

        return view('boleta.show', compact('boleta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $boleta = Boleta::find($id);

        return view('boleta.edit', compact('boleta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoletaRequest $request, Boleta $boleta)
    {
        $boleta->update($request->validated());

        return redirect()->route('boletas.index')
            ->with('success', 'Boleta updated successfully');
    }

    public function destroy($id)
    {
        Boleta::find($id)->delete();

        return redirect()->route('boletas.index')
            ->with('success', 'Boleta deleted successfully');
    }
}
