<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CotizacionProducto
 *
 * @property $id
 * @property $cotizacion_id
 * @property $producto_id
 * @property $imei
 * @property $created_at
 * @property $updated_at
 *
 * @property Cotizacion $cotizacion
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CotizacionProducto extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cotizacion_id', 'producto_id', 'imei'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cotizacion()
    {
        return $this->belongsTo(\App\Models\Cotizacion::class, 'cotizacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id', 'id');
    }
    

}
