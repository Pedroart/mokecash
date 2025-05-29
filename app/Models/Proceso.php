<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    const ESTADO_INICIADO = 'iniciado';
    const ESTADO_BOLETA_ENVIADA = 'boleta_enviada';
    const ESTADO_FIRMADO = 'firmado';
    const ESTADO_VENCIDO = 'vencido';
    const ESTADO_VALIDO = 'valido';
    const ESTADO_RECHAZADO = 'rechazado';


    protected $fillable = [
        'cotizacion_id',
        'tienda_id',
        'vendedor_id',
        'producto',
        'dni_cliente',
        'nombre_cliente',
        'telefono_cliente',
        'correo_cliente',
        'monto_solicitado',
        'tasa_interes',
        'monto_acreditado',
        'numero_cuotas',
        'estado',
        'fecha_limite_firma',
    ];

    protected $casts = [
        'fecha_limite_firma' => 'datetime',
    ];
}
