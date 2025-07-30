<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\ArchivadorProceso;
use App\Models\CotizacionProducto;
use App\Http\Requests\CotizacionRequest;
use App\Http\Requests\StoreEvidenciaRequest;
use App\Traits\UserContextTrait;
use Illuminate\Support\Facades\Auth;
use App\Traits\HandlesFileUploads;
use Illuminate\Http\Request;

/**
 * Class CotizacionController
 * @package App\Http\Controllers
 */
class CotizacionController extends Controller
{

    use UserContextTrait, HandlesFileUploads;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = $this->getUserRole();
        
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];

        if (in_array($role, $rolesPermitidos)) {
            $cotizacions = Cotizacion::orderBy('id', 'desc')->get(); // últimos primero
        } else {
            $tienda = $this->getUserTienda()->id;
            $cotizacions = Cotizacion::where('tienda_id', $tienda)
                                    ->orderBy('id', 'desc') // también ordenado
                                    ->get();
        }
        
        return view('cotizacion.index', compact('cotizacions'));
    }


    public function etapaAvanzar($id)
    {
        $cotizacion = Cotizacion::with('etapaProceso')->findOrFail($id);

        if ($cotizacion->avanzarEtapa()) {
            return back()->with('success', 'Etapa actualizada con éxito.');
        }

        return back()->with('error', 'No se pudo avanzar de etapa.');
    }

    public function etapaActual($id)
    {
        $cotizacion = Cotizacion::with('etapaProceso')->findOrFail($id);

        $etapa = $cotizacion->etapaProceso->estado ?? 'ingreso';

        return response()->json([
            'success' => true,
            'etapa_actual' => $etapa
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$cotizacion = new Cotizacion();

        $vendor_id = Auth::user()->id;
        $tienda_id = $this->getUserTienda()?->id ?? 1;

        return view('consulta-financiamiento.index', compact('vendor_id','tienda_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CotizacionRequest $request)
    {
        $validated = $request->validated();
        $cotizacion = Cotizacion::create($validated);
        
        $cotizacion->etapaProceso()->create([
            'estado' => 'ingreso',
        ]);

        $productos = json_decode($validated['productos_json'], true);
        foreach ($productos as $producto) {
            CotizacionProducto::create([
                'cotizacion_id'   => $cotizacion->id,
                'producto_id'     => $producto['id'],
                'precio'     => $producto['precio'],
                'imei'            => '-'

            ]);
        }


        return redirect()->route('cotizacions.show', $cotizacion->id)
        ->with('success', 'Cotización creada correctamente.');
    }

    public function storeArchivo(StoreEvidenciaRequest $request)
    {
        $archivo = $this->guardarArchivo(
            file: $request->file('file'),
            nombreVisible: $request->nombre,
            carpeta: $request->input('carpeta', 'uploads')
        );

        ArchivadorProceso::updateOrCreate(
            [
            'cotizacion_id' => $request->cotizacion_id,
            'clave' => $request->clave,
            ],
            [
            'valor' => $archivo->id,
            ]
        );

        return response()->json($archivo, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cotizacion = Cotizacion::find($id);
        
        $role = $this->getUserRole();
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];
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
