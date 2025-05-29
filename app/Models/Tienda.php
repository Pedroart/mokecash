<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'activo', 'tasa_interes', 'promotor_id', 'admin_tienda_id'
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function promotor()
    {
        return $this->belongsTo(User::class, 'promotor_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_tienda_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuarios_tienda')
            ->withPivot('rol_en_tienda')
            ->withTimestamps();
    }
}
