<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'talla',
        'color',
        'precio',
        'stock'
    ];

    public function detalles()
{
    return $this->hasMany(DetalleVenta::class);
}
public function producciones()
{
    return $this->hasMany(Produccion::class);
}
}