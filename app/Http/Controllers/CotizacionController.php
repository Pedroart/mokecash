<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Http\Requests\CotizacionRequest;
use App\Traits\UserContextTrait;
use Illuminate\Support\Facades\Auth;


/**
 * Class CotizacionController
 * @package App\Http\Controllers
 */
class CotizacionController extends Controller
{

    use UserContextTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = $this->getUserRole();
        
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];

        if (in_array($role, $rolesPermitidos)) {
            $cotizacions = Cotizacion::all();
        } else {
            $tienda = $this->getUserTienda()->id;
            $cotizacions = Cotizacion::where('tienda_id',$tienda)->get();
        }
        return view('cotizacion.index', compact('cotizacions'));
    }

    public function avanzar($id)
    {
        $cotizacion = Cotizacion::with('etapaProceso')->findOrFail($id);

        if ($cotizacion->avanzarEtapa()) {
            return back()->with('success', 'Etapa actualizada con éxito.');
        }

        return back()->with('error', 'No se pudo avanzar de etapa.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$cotizacion = new Cotizacion();

        $vendor_id = Auth::user()->id;
        $tienda_id = $this->getUserTienda()->id;

        return view('consulta-financiamiento.index', compact('vendor_id','tienda_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CotizacionRequest $request)
    {
        $cotizacion = Cotizacion::create($request->validated());
        
        $cotizacion->etapaProceso()->create([
            'estado' => 'ingreso',
        ]);

        return redirect()->route('cotizacions.index')
            ->with('success', 'Cotizacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cotizacion = Cotizacion::find($id);
        
        $role = $this->getUserRole();
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor','admin_tienda'];
        $vista_accion = in_array($role, $rolesPermitidos);

        return view('consulta-financiamiento.show', compact('cotizacion','vista_accion'));
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
