<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SeleccionesUsuario
 *
 * @property $id
 * @property $tienda_id
 * @property $vendedor_id
 * @property $dni_cliente
 * @property $nombre_cliente
 * @property $linea_credito
 * @property $producto_id
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Producto $producto
 * @property Tienda $tienda
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SeleccionesUsuario extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tienda_id', 'vendedor_id', 'dni_cliente', 'nombre_cliente', 'linea_credito', 'producto_id', 'precio'];


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
    public function vendedor()
    {
        return $this->belongsTo(\App\Models\User::class, 'vendedor_id', 'id');
    }
    

}
