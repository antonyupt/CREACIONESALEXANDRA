<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $fillable = [
        'producto_id',
        'cantidad',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function venta()
{
    return $this->belongsTo(Venta::class);
}
}