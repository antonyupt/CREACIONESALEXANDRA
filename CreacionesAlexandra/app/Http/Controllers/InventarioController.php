<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class InventarioController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view(
            'inventario.index',
            compact('productos')
        );
    }
}