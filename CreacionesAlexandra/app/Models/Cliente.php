<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [

        'tipo_documento',
        'numero_documento',
        'nombre',
        'telefono',
        'correo',
        'direccion'

    ];
    public function ventas()
{
    return $this->hasMany(Venta::class);
}
}