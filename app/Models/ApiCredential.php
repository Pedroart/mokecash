<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario',
        'password',
    ];

    public function tokens()
    {
        return $this->hasMany(ApiToken::class);
    }
}
