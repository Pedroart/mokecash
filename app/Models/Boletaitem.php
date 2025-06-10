<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Boletaitem
 *
 * @property $id
 * @property $boleta_id
 * @property $sku
 * @property $descripcion
 * @property $unidad_de_medida
 * @property $cantidad
 * @property $valor_unitario
 * @property $precio_unitario_con_igv
 * @property $codigo_tipo_afectacion_igv
 * @property $porcentaje_igv
 * @property $descuento_item
 * @property $total_item
 * @property $created_at
 * @property $updated_at
 *
 * @property Boleta $boleta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Boletaitem extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['boleta_id', 'sku', 'descripcion', 'unidad_de_medida', 'cantidad', 'valor_unitario', 'precio_unitario_con_igv', 'codigo_tipo_afectacion_igv', 'porcentaje_igv', 'descuento_item', 'total_item'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function boleta()
    {
        return $this->belongsTo(\App\Models\Boleta::class, 'boleta_id', 'id');
    }
    

}
