<?php

namespace App\Http\Controllers;

use App\Models\CotizacionProducto;
use App\Http\Requests\CotizacionProductoRequest;
use Illuminate\Http\Request;

/**
 * Class CotizacionProductoController
 * @package App\Http\Controllers
 */
class CotizacionProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cotizacionProductos = CotizacionProducto::all();

        return view('cotizacion-producto.index', compact('cotizacionProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cotizacionProducto = new CotizacionProducto();
        return view('cotizacion-producto.create', compact('cotizacionProducto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CotizacionProductoRequest $request)
    {
        CotizacionProducto::create($request->validated());

        return redirect()->route('cotizacion-productos.index')
            ->with('success', 'CotizacionProducto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cotizacionProducto = CotizacionProducto::find($id);

        return view('cotizacion-producto.show', compact('cotizacionProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cotizacionProducto = CotizacionProducto::find($id);

        return view('cotizacion-producto.edit', compact('cotizacionProducto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CotizacionProductoRequest $request, CotizacionProducto $cotizacionProducto)
    {
        $cotizacionProducto->update($request->validated());

        return redirect()->route('cotizacion-productos.index')
            ->with('success', 'CotizacionProducto updated successfully');
    }

    public function actualizarImei(Request $request, $id)
    {
        $cp = CotizacionProducto::findOrFail($id);
        $cp->imei = $request->input('imei');
        $cp->save();

        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        CotizacionProducto::find($id)->delete();

        return redirect()->route('cotizacion-productos.index')
            ->with('success', 'CotizacionProducto deleted successfully');
    }
}
