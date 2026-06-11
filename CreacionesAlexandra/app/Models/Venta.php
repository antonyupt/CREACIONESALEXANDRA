<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   protected $fillable = [
    'cliente_id',
    'fecha',
    'total',
    'estado'
];
public function cliente()
{
    return $this->belongsTo(Cliente::class);
}

public function detalles()
{
    return $this->hasMany(DetalleVenta::class);
}
public function producciones()
{
    return $this->hasMany(Produccion::class);
}
}
