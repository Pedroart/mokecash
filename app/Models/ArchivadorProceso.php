<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ArchivadorProceso
 *
 * @property $id
 * @property $cotizacion_id
 * @property $clave
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @property Cotizacion $cotizacion
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ArchivadorProceso extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cotizacion_id', 'clave', 'valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cotizacion()
    {
        return $this->belongsTo(\App\Models\Cotizacion::class, 'cotizacion_id', 'id');
    }
    

}
