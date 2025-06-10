<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $tienda_id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $created_at
 * @property $updated_at
 *
 * @property Tienda $tienda
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tienda_id', 'nombre', 'descripcion', 'precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tienda()
    {
        return $this->belongsTo(\App\Models\Tienda::class, 'tienda_id', 'id');
    }
    

}
