<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'proceso_id',
        'serie',
        'numero',
        'monto_total',
        'json_data',
        'fecha_emision',
    ];

    protected $casts = [
        'json_data' => 'array',
        'fecha_emision' => 'date',
    ];

    public function proceso()
    {
        return $this->belongsTo(Proceso::class);
    }
}
