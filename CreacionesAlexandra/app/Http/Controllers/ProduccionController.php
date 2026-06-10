<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producciones = Produccion::with('producto')
        ->latest()
        ->get();

    return view(
        'produccion.index',
        compact('producciones')
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $productos = Producto::all();

    return view(
        'produccion.create',
        compact('productos')
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Produccion::create([

        'producto_id' => $request->producto_id,
        'cantidad' => $request->cantidad,
        'fecha_inicio' => $request->fecha_inicio,
        'estado' => 'Pendiente'

    ]);

    return redirect()
        ->route('produccion.index')
        ->with(
            'success',
            'Producción registrada'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Produccion $produccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produccion $produccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produccion $produccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produccion $produccion)
    {
        //
    }
}
