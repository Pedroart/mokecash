<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EtapasProceso
 *
 * @property $id
 * @property $cotizacion_id
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Cotizacion $cotizacion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EtapasProceso extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cotizacion_id', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cotizacion()
    {
        return $this->belongsTo(\App\Models\Cotizacion::class, 'cotizacion_id', 'id');
    }
    

}
