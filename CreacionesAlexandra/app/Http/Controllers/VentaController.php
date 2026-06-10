<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\DetalleVenta;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $ventas = Venta::with('cliente')->get();

    return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
    $productos = Producto::all();

    return view('ventas.create', compact(
        'clientes',
        'productos'
    ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $productos = json_decode(
        $request->productos,
        true
    );

    if (!$productos || count($productos) == 0)
    {
        return back()->with(
            'error',
            'Debe agregar al menos un producto.'
        );
    }

    // VALIDAR STOCK ANTES DE CREAR LA VENTA
    foreach($productos as $producto)
    {
        $productoModel = Producto::find(
            $producto['producto_id']
        );

        if(!$productoModel)
        {
            return back()->with(
                'error',
                'Producto no encontrado.'
            );
        }

        if($productoModel->stock <= 0)
        {
            return back()->with(
                'error',
                'El producto '.$productoModel->nombre.
                ' está agotado.'
            );
        }

        if($productoModel->stock < $producto['cantidad'])
        {
            return back()->with(
                'error',
                'Stock insuficiente de '.$productoModel->nombre.
                '. Disponible: '.$productoModel->stock
            );
        }
    }

    // RECIÉN CREAR LA VENTA
    $venta = Venta::create([

        'cliente_id' => $request->cliente_id,
        'fecha' => $request->fecha,
        'total' => $request->total,
        'estado' => 'Pendiente'

    ]);

    foreach($productos as $producto)
    {
        DetalleVenta::create([

            'venta_id' => $venta->id,
            'producto_id' => $producto['producto_id'],
            'cantidad' => $producto['cantidad'],
            'precio' => $producto['precio'],
            'subtotal' => $producto['subtotal']

        ]);

        // DESCONTAR STOCK
        $productoModel = Producto::find(
            $producto['producto_id']
        );

        $productoModel->stock -=
            $producto['cantidad'];

        $productoModel->save();
    }

    return redirect()
        ->route('ventas.index')
        ->with(
            'success',
            'Venta registrada correctamente'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
