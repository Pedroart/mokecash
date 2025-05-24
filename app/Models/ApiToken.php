<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_credential_id',
        'auth_token',
        'aliado_id',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function credential()
    {
        return $this->belongsTo(ApiCredential::class, 'api_credential_id');
    }
}
