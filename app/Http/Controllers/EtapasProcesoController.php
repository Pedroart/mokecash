<?php

namespace App\Http\Controllers;

use App\Models\EtapasProceso;
use App\Http\Requests\EtapasProcesoRequest;

/**
 * Class EtapasProcesoController
 * @package App\Http\Controllers
 */
class EtapasProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etapasProcesos = EtapasProceso::all();

        return view('etapas-proceso.index', compact('etapasProcesos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etapasProceso = new EtapasProceso();
        return view('etapas-proceso.create', compact('etapasProceso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtapasProcesoRequest $request)
    {
        EtapasProceso::create($request->validated());

        return redirect()->route('etapas-procesos.index')
            ->with('success', 'EtapasProceso created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $etapasProceso = EtapasProceso::find($id);

        return view('etapas-proceso.show', compact('etapasProceso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $etapasProceso = EtapasProceso::find($id);

        return view('etapas-proceso.edit', compact('etapasProceso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtapasProcesoRequest $request, EtapasProceso $etapasProceso)
    {
        $etapasProceso->update($request->validated());

        return redirect()->route('etapas-procesos.index')
            ->with('success', 'EtapasProceso updated successfully');
    }

    public function destroy($id)
    {
        EtapasProceso::find($id)->delete();

        return redirect()->route('etapas-procesos.index')
            ->with('success', 'EtapasProceso deleted successfully');
    }
}
