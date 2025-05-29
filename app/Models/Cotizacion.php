<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'tienda_id',
        'vendedor_id',
        'dni_cliente',
        'monto_solicitado',
        'ip_origen',
    ];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }
}
