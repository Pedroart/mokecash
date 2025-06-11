<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cotizacion
 *
 * @property $id
 * @property $tienda_id
 * @property $vendedor_id
 * @property $producto_id
 * @property $dni_cliente
 * @property $nombre_cliente
 * @property $direccion
 * @property $cuotas
 * @property $monto
 * @property $monto_financiado
 * @property $estatus
 * @property $ip_origen
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Tienda $tienda
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cotizacion extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tienda_id', 'vendedor_id', 'producto_id', 'dni_cliente', 'nombre_cliente', 'direccion', 'cuotas', 'monto', 'monto_financiado', 'estatus', 'ip_origen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tienda()
    {
        return $this->belongsTo(\App\Models\Tienda::class, 'tienda_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'vendedor_id', 'id');
    }
    
    public function items()
    {
        return $this->hasMany(\App\Models\ArchivadorProceso::class, 'cotizacion_id', 'id');
    }

    public function correoElectronico(): ?string
    {
        return $this->items->firstWhere('clave', 'correo')?->valor;
    }


    public function telefono(): ?string
    {
        return $this->items->firstWhere('clave', 'telefono')?->valor;
    }


    public function imei(): ?string
    {
        return $this->items->firstWhere('clave', 'imei')?->valor;
    }

    public function boleta(): ?string
    {
        return $this->items->firstWhere('clave', 'boleta')?->valor;
    }

    public function etapaProceso()
    {
        return $this->hasOne(\App\Models\EtapasProceso::class, 'cotizacion_id');
    }

    public function etapaActual(): ?string
    {
        return $this->etapaProceso?->estado;
    }

    public function etapasFaltantes(): int
    {
        $ordenEtapas = ['ingreso', 'biometria', 'validacion', 'boleta', 'pago'];
        $actual = $this->etapaProceso?->estado;

        $posicionActual = array_search($actual, $ordenEtapas);
        if ($posicionActual === false) return count($ordenEtapas);

        return count($ordenEtapas) - ($posicionActual + 1);
    }

    public function avanzarEtapa(): bool
    {
        $ordenEtapas = ['ingreso', 'biometria', 'validacion', 'boleta', 'pago'];

        $etapa = $this->etapaProceso;
        if (!$etapa) return false;

        $posActual = array_search($etapa->estado, $ordenEtapas);

        // Si ya está en la última etapa o no se reconoce, no avanza
        if ($posActual === false || $posActual === count($ordenEtapas) - 1) {
            return false;
        }

        $etapa->estado = $ordenEtapas[$posActual + 1];
        return $etapa->save();
    }



}
