<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boleta
 *
 * @property $id
 * @property $serie
 * @property $numero
 * @property $numero_boleta_completo
 * @property $fecha_emision
 * @property $fecha_vencimiento
 * @property $moneda
 * @property $tipo_operacion
 * @property $cajero
 * @property $empresa_nombre
 * @property $empresa_ruc
 * @property $empresa_direccion
 * @property $cliente_tipo_documento
 * @property $cliente_numero_documento
 * @property $cliente_denominacion
 * @property $cliente_direccion
 * @property $total_gravada
 * @property $total_igv
 * @property $importe_total
 * @property $importe_letras
 * @property $metodo_pago
 * @property $monto_pagado
 * @property $cambio
 * @property $api_hash
 * @property $xml_url
 * @property $cdr_url
 * @property $qr_code_path
 * @property $sunat_resolucion
 * @property $created_at
 * @property $updated_at
 *
 * @property Boletaitem[] $boletaitems
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Boleta extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['serie', 'numero', 'numero_boleta_completo', 'fecha_emision', 'fecha_vencimiento', 'moneda', 'tipo_operacion', 'cajero', 'empresa_nombre', 'empresa_ruc', 'empresa_direccion', 'cliente_tipo_documento', 'cliente_numero_documento', 'cliente_denominacion', 'cliente_direccion', 'total_gravada', 'total_igv', 'importe_total', 'importe_letras', 'metodo_pago', 'monto_pagado', 'cambio', 'api_hash', 'xml_url', 'cdr_url', 'qr_code_path', 'sunat_resolucion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(\App\Models\Boletaitem::class, 'boleta_id', 'id');
    }
    
    protected $casts = [
        'fecha_emision' => 'date',
        'fecha_vencimiento' => 'date',
    ];

}
