<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    /**
     * Mostrar listado
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
     * Formulario crear
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
     * Guardar producción
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'cantidad' => 'required|numeric|min:1',
            'fecha_inicio' => 'required|date',
        ]);

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
                'Producción registrada correctamente'
            );
    }

    /**
     * Mostrar producción
     */
    public function show(Produccion $produccion)
    {
        //
    }

    /**
     * Editar producción
     */
    public function edit(Produccion $produccion)
    {
        //
    }

    /**
     * Actualizar producción
     */
    public function update(Request $request, Produccion $produccion)
    {
        //
    }

    /**
     * Eliminar producción
     */
    public function destroy(Produccion $produccion)
    {
        //
    }

    /**
     * Cambiar a En Producción
     */
    public function iniciar($id)
    {
        $produccion = Produccion::findOrFail($id);

        $produccion->estado = 'En Producción';
        $produccion->save();

        return redirect()
            ->route('produccion.index')
            ->with(
                'success',
                'Producción iniciada correctamente'
            );
    }

    /**
     * Finalizar producción
     */
    public function terminar($id)
{
    $produccion = Produccion::findOrFail($id);

    $produccion->estado = 'Terminado';
    $produccion->fecha_fin = now();
    $produccion->save();

    $producto = Producto::find($produccion->producto_id);

    if ($producto) {
        $producto->stock += $produccion->cantidad;
        $producto->save();
    }

    // COMPLETAR LA VENTA
    if ($produccion->venta) {

        $produccion->venta->estado = 'Completado';

        $produccion->venta->save();
    }

    return redirect()
        ->route('produccion.index')
        ->with(
            'success',
            'Producción finalizada correctamente'
        );
}
}