<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function index()
    {
        $ventasTotales = Venta::sum('total');

        $cantidadVentas = Venta::count();

        $ticketPromedio =
            $cantidadVentas > 0
            ? $ventasTotales / $cantidadVentas
            : 0;

        return view(
            'reportes.index',
            compact(
                'ventasTotales',
                'cantidadVentas',
                'ticketPromedio'
            )
        );
    }

    public function pdf()
{
    $ventas = Venta::with('cliente')
        ->orderBy('fecha', 'desc')
        ->get();

    $totalVentas = Venta::sum('total');

    $pdf = Pdf::loadView(
        'reportes.pdf',
        compact(
            'ventas',
            'totalVentas'
        )
    );

    return $pdf->download(
        'Reporte_Ventas.pdf'
    );
}
}