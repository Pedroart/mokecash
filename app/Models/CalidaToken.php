<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CalidaToken
 *
 * @property $id
 * @property $calida_credential_id
 * @property $auth_token
 * @property $aliado_id
 * @property $expires_at
 * @property $created_at
 * @property $updated_at
 *
 * @property CalidaCredential $calidaCredential
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CalidaToken extends Model
{
    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['calida_credential_id', 'auth_token', 'aliado_id', 'expires_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calidaCredential()
    {
        return $this->belongsTo(\App\Models\CalidaCredential::class, 'calida_credential_id', 'id');
    }
    

}
