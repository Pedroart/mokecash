<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tienda
 *
 * @property $id
 * @property $nombre
 * @property $direccion
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tienda extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'direccion', 'telefono'];

    public function personal()
    {
        return $this->hasMany(PersonalTienda::class);
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
