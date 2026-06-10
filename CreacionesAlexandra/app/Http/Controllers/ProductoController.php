<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $productos = Producto::all();

    return view('productos.index', compact('productos'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('productos.create');
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    Producto::create([

        'codigo' => $request->codigo,
        'nombre' => $request->nombre,
        'categoria' => $request->categoria,
        'talla' => $request->talla,
        'color' => $request->color,
        'precio' => $request->precio,
        'stock' => $request->stock

    ]);

    return redirect()->route('productos.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $producto = Producto::findOrFail($id);

    return view('productos.edit', compact('producto'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->update([

        'codigo' => $request->codigo,
        'nombre' => $request->nombre,
        'categoria' => $request->categoria,
        'talla' => $request->talla,
        'color' => $request->color,
        'precio' => $request->precio,
        'stock' => $request->stock

    ]);

    return redirect()->route('productos.index');
}

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->delete();

    return redirect()->route('productos.index');
}
}
