<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CalidaCredential
 *
 * @property $id
 * @property $usuario
 * @property $tokencontra
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CalidaCredential extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario', 'tokencontra'];



}
