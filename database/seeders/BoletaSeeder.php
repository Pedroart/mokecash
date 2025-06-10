<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Boleta;
use App\Models\Boletaitem;
use Illuminate\Support\Str;

class BoletaSeeder extends Seeder
{
    public function run(): void
    {
        // Crear la boleta
        $boleta = Boleta::create([
            'serie' => 'B001',
            'numero' => 2027,
            'numero_boleta_completo' => 'B001-00002027',
            'fecha_emision' => now(),
            'fecha_vencimiento' => now()->addDays(7),
            'moneda' => 'PEN',
            'tipo_operacion' => '0101',
            'cajero' => 'Vendedor 1',
            'empresa_nombre' => 'Moke SAC',
            'empresa_ruc' => '2020606031',
            'empresa_direccion' => 'Av. Ejemplo 123, Lima',

            'cliente_tipo_documento' => '1',
            'cliente_numero_documento' => '74085467',
            'cliente_denominacion' => 'Pedro Francisco Arteta Flores',
            'cliente_direccion' => 'Calle Ficticia 456, Callao',

            'total_gravada' => 152.54,
            'total_igv' => 27.46,
            'importe_total' => 180.00,
            'importe_letras' => 'CIENTO OCHENTA Y 00/100 SOLES',

            'metodo_pago' => 'Efectivo',
            'monto_pagado' => 200.00,
            'cambio' => 20.00,

            'api_hash' => Str::random(20),
            'xml_url' => 'https://ejemplo.com/boleta.xml',
            'cdr_url' => 'https://ejemplo.com/cdr.xml',
            'qr_code_path' => 'storage/boletas/qr/boleta_2027.png',
            'sunat_resolucion' => 'RSN° 018-005-000152',
        ]);

        // Ítems asociados
        $items = [
            [
                'sku' => 'PRD001',
                'descripcion' => 'Producto A',
                'unidad_de_medida' => 'NIU',
                'cantidad' => 2,
                'valor_unitario' => 50.00,
                'precio_unitario_con_igv' => 59.00,
                'codigo_tipo_afectacion_igv' => '10',
                'porcentaje_igv' => 18.00,
                'descuento_item' => 0.00,
                'total_item' => 100.00,
            ],
            [
                'sku' => 'PRD002',
                'descripcion' => 'Producto B',
                'unidad_de_medida' => 'NIU',
                'cantidad' => 1,
                'valor_unitario' => 52.54,
                'precio_unitario_con_igv' => 62.00,
                'codigo_tipo_afectacion_igv' => '10',
                'porcentaje_igv' => 18.00,
                'descuento_item' => 0.00,
                'total_item' => 52.54,
            ],
        ];

        foreach ($items as $item) {
            $item['boleta_id'] = $boleta->id;
            Boletaitem::create($item);
        }
    }
}
