@extends('layouts.app')

@section('content')

<!-- TÍTULO -->
<div class="flex justify-between items-center mb-6">

    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Productos
        </h1>

        <p class="text-gray-500">
            Gestión de productos e inventario
        </p>
    </div>

    <a href="{{ route('productos.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Nuevo Producto

    </a>

</div>

<!-- TARJETAS -->
<div class="grid grid-cols-4 gap-6 mb-6">

    <div class="bg-white rounded-xl shadow p-5">

        <p class="text-gray-500 text-sm">
            Total Productos
        </p>

        <h2 class="text-3xl font-bold mt-2">
            {{ $productos->count() }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-5">

        <p class="text-gray-500 text-sm">
            Stock Total
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            {{ $productos->sum('stock') }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-5">

        <p class="text-gray-500 text-sm">
            Categorías
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $productos->groupBy('categoria')->count() }}
        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-5">

        <p class="text-gray-500 text-sm">
            Stock Bajo
        </p>

        <h2 class="text-3xl font-bold text-red-600 mt-2">
            {{ $productos->where('stock','<',10)->count() }}
        </h2>

    </div>

</div>

<!-- TABLA -->
<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center mb-5">

        <h2 class="text-xl font-bold">
            Lista de Productos
        </h2>

        <input
            type="text"
            id="buscarProducto"
            placeholder="🔍 Buscar producto..."
            class="border rounded-lg px-4 py-2 w-72">

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-4 py-3 text-left">
                        Código
                    </th>

                    <th class="px-4 py-3 text-left">
                        Producto
                    </th>

                    <th class="px-4 py-3 text-left">
                        Categoría
                    </th>

                    <th class="px-4 py-3 text-left">
                        Precio
                    </th>

                    <th class="px-4 py-3 text-left">
                        Stock
                    </th>

                    <th class="px-4 py-3 text-center">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody id="tablaProductos">

                @foreach($productos as $producto)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-4 py-4">
                        {{ $producto->codigo }}
                    </td>

                    <td class="px-4 py-4 font-semibold">
                        {{ $producto->nombre }}
                    </td>

                    <td class="px-4 py-4">
                        {{ $producto->categoria }}
                    </td>

                    <td class="px-4 py-4 font-medium">
                        S/ {{ number_format($producto->precio,2) }}
                    </td>

                    <td class="px-4 py-4">

                        @if($producto->stock < 10)

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $producto->stock }}
                            </span>

                        @elseif($producto->stock < 30)

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $producto->stock }}
                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $producto->stock }}
                            </span>

                        @endif

                    </td>

                    <td class="px-4 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('productos.edit', $producto->id) }}"
                               class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg shadow">

                                ✏️

                            </a>

                            <form action="{{ route('productos.destroy', $producto->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar producto?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">

                                    🗑️

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>

document.getElementById('buscarProducto').addEventListener('keyup', function() {

    let filtro = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaProductos tr');

    filas.forEach(fila => {

        let texto = fila.innerText.toLowerCase();

        fila.style.display =
            texto.includes(filtro)
            ? ''
            : 'none';

    });

});

</script>

@endsection