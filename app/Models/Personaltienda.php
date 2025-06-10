<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Personaltienda
 *
 * @property $id
 * @property $user_id
 * @property $tienda_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Tienda $tienda
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Personaltienda extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'tienda_id'];


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
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    

}
