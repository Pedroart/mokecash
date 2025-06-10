<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tienda;
use App\Http\Requests\ProductoRequest;
use App\Traits\UserContextTrait;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{

    use UserContextTrait;

    public function productosPorTienda($tiendaId)
    {
        $productos = Producto::where('tienda_id', $tiendaId)->get();

        return response()->json([
            'success' => true,
            'tienda_id' => $tiendaId,
            'productos' => $productos,
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = $this->getUserRole();
        

        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];

        if (in_array($role, $rolesPermitidos)) {
            $productos = Producto::all();
        } else {
            $tienda = $this->getUserTienda()->id;
            $productos = Producto::where('tienda_id',$tienda)->get();
        }

        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producto = new Producto();
        $role = $this->getUserRole();
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];

        if (in_array($role, $rolesPermitidos)) {
            $tiendas = Tienda::all();
        } else {
            $tienda = $this->getUserTienda();
            $tiendas = $tienda ? collect([$tienda]) : collect(); // en caso no tenga tienda
        }

        return view('producto.create', compact('producto', 'tiendas'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        Producto::create($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $role = $this->getUserRole();
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];

        if (in_array($role, $rolesPermitidos)) {
            $tiendas = Tienda::all();
        } else {
            $tienda = $this->getUserTienda();
            $tiendas = $tienda ? collect([$tienda]) : collect(); // en caso no tenga tienda
        }


        return view('producto.show', compact('producto','tiendas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
                $role = $this->getUserRole();
        $rolesPermitidos = ['admin', 'validador', 'finanzas', 'promotor'];

        if (in_array($role, $rolesPermitidos)) {
            $tiendas = Tienda::all();
        } else {
            $tienda = $this->getUserTienda();
            $tiendas = $tienda ? collect([$tienda]) : collect(); // en caso no tenga tienda
        }

        return view('producto.edit', compact('producto','tiendas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
