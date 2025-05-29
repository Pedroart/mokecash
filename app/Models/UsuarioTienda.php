<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioTienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id', 'activo', 'tienda_id', 'rol_en_tienda',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
