<?php

namespace App\Http\Controllers;

use App\Models\Boletaitem;
use App\Http\Requests\BoletaitemRequest;

/**
 * Class BoletaitemController
 * @package App\Http\Controllers
 */
class BoletaitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boletaitems = Boletaitem::all();

        return view('boletaitem.index', compact('boletaitems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $boletaitem = new Boletaitem();
        return view('boletaitem.create', compact('boletaitem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoletaitemRequest $request)
    {
        Boletaitem::create($request->validated());

        return redirect()->route('boletaitems.index')
            ->with('success', 'Boletaitem created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $boletaitem = Boletaitem::find($id);

        return view('boletaitem.show', compact('boletaitem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $boletaitem = Boletaitem::find($id);

        return view('boletaitem.edit', compact('boletaitem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoletaitemRequest $request, Boletaitem $boletaitem)
    {
        $boletaitem->update($request->validated());

        return redirect()->route('boletaitems.index')
            ->with('success', 'Boletaitem updated successfully');
    }

    public function destroy($id)
    {
        Boletaitem::find($id)->delete();

        return redirect()->route('boletaitems.index')
            ->with('success', 'Boletaitem deleted successfully');
    }
}
