<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use App\Http\Requests\TiendaRequest;
use App\Models\User;
use App\Models\Personaltienda;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Class TiendaController
 * @package App\Http\Controllers
 */
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendas = Tienda::all();

        return view('tienda.index', compact('tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tienda = new Tienda();
        return view('tienda.create', compact('tienda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSave(TiendaRequest $request)
    {
        Tienda::create($request->validated());

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda created successfully.');
    }

    public function store(TiendaRequest $request){
        $tienda = Tienda::create($request->validated());

        // Generar subdominio a partir del nombre
        $subdominio = Str::slug($tienda->nombre); // Ej: "PDV MARIO UNICACHI" → "pdv-mario-unicachi"
        $dominioBase = "pe";
        $password = $subdominio.'*';

        foreach (['admin_tienda', 'vendedor'] as $rol) {
            $email = "{$rol}@{$subdominio}.{$dominioBase}";

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => ucfirst($rol) . ' ' . ucfirst($tienda->nombre),
                    'password' => Hash::make($password),
                ]
            );

            $user->assignRole($rol);

            Personaltienda::firstOrCreate([
                'user_id' => $user->id,
                'tienda_id' => $tienda->id,
            ]);
        }

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda y usuarios creados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.show', compact('tienda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tienda = Tienda::find($id);

        return view('tienda.edit', compact('tienda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiendaRequest $request, Tienda $tienda)
    {
        $tienda->update($request->validated());

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda updated successfully');
    }

    public function destroy($id)
    {
        Tienda::find($id)->delete();

        return redirect()->route('tiendas.index')
            ->with('success', 'Tienda deleted successfully');
    }
}
