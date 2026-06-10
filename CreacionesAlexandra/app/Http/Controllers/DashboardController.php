<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $ventasMes = \App\Models\Venta::whereMonth(
        'fecha',
        now()->month
    )->sum('total');

    $ventasAnio = \App\Models\Venta::whereYear(
        'fecha',
        now()->year
    )->sum('total');

    $clientes = \App\Models\Cliente::count();

    $stockBajo = \App\Models\Producto::where(
        'stock',
        '<=',
        10
    )->count();

    $pedidosPendientes = \App\Models\Venta::where(
        'estado',
        'Pendiente'
    )->count();

    $productosMasVendidos =
        \App\Models\DetalleVenta::selectRaw(
            'producto_id, SUM(cantidad) as total'
        )
        ->groupBy('producto_id')
        ->orderByDesc('total')
        ->with('producto')
        ->take(5)
        ->get();

    return view('dashboard.index', compact(
        'ventasMes',
        'ventasAnio',
        'clientes',
        'stockBajo',
        'pedidosPendientes',
        'productosMasVendidos'
    ));
}
}
