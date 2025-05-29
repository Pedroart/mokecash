<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentoproceso extends Model
{
    use HasFactory;

    protected $fillable = [
        'proceso_id',
        'subido_por',
        'tipo',
        'archivo',
        'descripcion',
    ];

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'subido_por');
    }
}
