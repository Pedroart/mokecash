<?php

namespace App\Http\Controllers;

use App\Models\ArchivadorProceso;
use App\Http\Requests\ArchivadorProcesoRequest;

/**
 * Class ArchivadorProcesoController
 * @package App\Http\Controllers
 */
class ArchivadorProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archivadorProcesos = ArchivadorProceso::all();

        return view('archivador-proceso.index', compact('archivadorProcesos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $archivadorProceso = new ArchivadorProceso();
        return view('archivador-proceso.create', compact('archivadorProceso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArchivadorProcesoRequest $request)
    {
        ArchivadorProceso::create($request->validated());

        return redirect()->route('archivador-procesos.index')
            ->with('success', 'ArchivadorProceso created successfully.');
    }

    public function store2(ArchivadorProcesoRequest $request)
    {
        $validated = $request->validated();

        $registro = ArchivadorProceso::updateOrCreate(
            [
                'cotizacion_id' => $validated['cotizacion_id'],
                'clave'         => $validated['clave'],
            ],
            [
                'valor' => $validated['valor']
            ]
        );

        return response()->json(['success' => true, 'data' => $registro]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $archivadorProceso = ArchivadorProceso::find($id);

        return view('archivador-proceso.show', compact('archivadorProceso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $archivadorProceso = ArchivadorProceso::find($id);

        return view('archivador-proceso.edit', compact('archivadorProceso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArchivadorProcesoRequest $request, ArchivadorProceso $archivadorProceso)
    {
        $archivadorProceso->update($request->validated());

        return redirect()->route('archivador-procesos.index')
            ->with('success', 'ArchivadorProceso updated successfully');
    }

    public function destroy($id)
    {
        ArchivadorProceso::find($id)->delete();

        return redirect()->route('archivador-procesos.index')
            ->with('success', 'ArchivadorProceso deleted successfully');
    }
}
