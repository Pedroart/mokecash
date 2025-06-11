<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Boleta;
use App\Models\Boletaitem;
use Illuminate\Routing\Controller;
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

    public function generar(Request $request)
    {
        $request->validate([
            'sku' => 'required|string',
            'descripcion' => 'required|string',
            'precio_con_igv' => 'required|numeric',
            'cantidad' => 'required|integer|min:1',
            'cliente_nombre' => 'required|string',
            'cliente_documento' => 'required|string',
            'cliente_direccion' => 'required|string',
            'lugar_venta' => 'required|string',
        ]);

        $data = $request->all();
        $igv_porcentaje = 18;
        $factor = 1 + ($igv_porcentaje / 100);

        $valor_unitario = round($data['precio_con_igv'] / $factor, 2);
        $valor_total = round($valor_unitario * $data['cantidad'], 2);
        $igv_total = round($valor_total * ($igv_porcentaje / 100), 2);
        $importe_total = $valor_total + $igv_total;

        $numero = Boleta::max('numero') + 1;
        $numero_formato = str_pad($numero, 8, '0', STR_PAD_LEFT);

        $boleta = Boleta::create([
            'serie' => 'B001',
            'numero' => $numero,
            'numero_boleta_completo' => 'B001-' . $numero_formato,
            'fecha_emision' => now(),
            'fecha_vencimiento' => now()->addDays(7),
            'moneda' => 'PEN',
            'tipo_operacion' => '0101',
            'cajero' => $data['lugar_venta'],

            'empresa_nombre' => 'MOKE SAC',
            'empresa_ruc' => '20613765175',
            'empresa_direccion' => 'Av. Ejemplo 123, Lima',

            'cliente_tipo_documento' => '1',
            'cliente_numero_documento' => $data['cliente_documento'],
            'cliente_denominacion' => $data['cliente_nombre'],
            'cliente_direccion' => $data['cliente_direccion'],

            'total_gravada' => $valor_total,
            'total_igv' => $igv_total,
            'importe_total' => $importe_total,
            'importe_letras' => strtoupper($this->numeroALetras($importe_total)),

            'metodo_pago' => 'Efectivo',
            'monto_pagado' => $importe_total,
            'cambio' => 0.00,

            'api_hash' => Str::random(20),
            'xml_url' => '',
            'cdr_url' => '',
            'qr_code_path' => '',
            'sunat_resolucion' => 'RSN° 018-005-000152',
        ]);

        Boletaitem::create([
            'boleta_id' => $boleta->id,
            'sku' => $data['sku'],
            'descripcion' => $data['descripcion'],
            'unidad_de_medida' => 'NIU',
            'cantidad' => $data['cantidad'],
            'valor_unitario' => $valor_unitario,
            'precio_unitario_con_igv' => $data['precio_con_igv'],
            'codigo_tipo_afectacion_igv' => '10',
            'porcentaje_igv' => $igv_porcentaje,
            'descuento_item' => 0.00,
            'total_item' => $valor_total,
        ]);

        return response()->json([
            'success' => true,
            'boleta_id' => $boleta->id,
            'numero_boleta' => $boleta->numero_boleta_completo,
        ]);
    }

    private function numeroALetras($numero)
    {
        $entero = floor($numero);
        $decimales = round(($numero - $entero) * 100);

        $unidades = [
            '', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'
        ];

        $decenas = [
            '', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'
        ];

        if ($entero < 10) {
            $letras = $unidades[$entero];
        } elseif ($entero < 100) {
            $letras = $decenas[intval($entero / 10)] . ' y ' . $unidades[$entero % 10];
        } else {
            $letras = $entero; // simplificado
        }

        return strtoupper($letras) . ' Y ' . str_pad($decimales, 2, '0', STR_PAD_LEFT) . '/100 SOLES';
    }
}
