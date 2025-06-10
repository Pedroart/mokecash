<?php

namespace App\Http\Controllers;

use App\Models\Personaltienda;
use App\Http\Requests\PersonaltiendaRequest;

/**
 * Class PersonaltiendaController
 * @package App\Http\Controllers
 */
class PersonaltiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personaltiendas = Personaltienda::all();

        return view('personaltienda.index', compact('personaltiendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personaltienda = new Personaltienda();
        return view('personaltienda.create', compact('personaltienda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonaltiendaRequest $request)
    {
        Personaltienda::create($request->validated());

        return redirect()->route('personaltiendas.index')
            ->with('success', 'Personaltienda created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personaltienda = Personaltienda::find($id);

        return view('personaltienda.show', compact('personaltienda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personaltienda = Personaltienda::find($id);

        return view('personaltienda.edit', compact('personaltienda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonaltiendaRequest $request, Personaltienda $personaltienda)
    {
        $personaltienda->update($request->validated());

        return redirect()->route('personaltiendas.index')
            ->with('success', 'Personaltienda updated successfully');
    }

    public function destroy($id)
    {
        Personaltienda::find($id)->delete();

        return redirect()->route('personaltiendas.index')
            ->with('success', 'Personaltienda deleted successfully');
    }
}
