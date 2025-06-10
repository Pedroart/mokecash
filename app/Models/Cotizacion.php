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
 * @property $cuotas
 * @property $monto
 * @property $dni_cliente
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
    protected $fillable = ['tienda_id', 'vendedor_id', 'producto_id', 'cuotas', 'monto', 'dni_cliente', 'ip_origen'];


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
    

}
