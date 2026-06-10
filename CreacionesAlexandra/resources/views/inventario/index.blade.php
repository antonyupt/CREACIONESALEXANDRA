@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-5">
        Inventario
    </h2>

    {{-- Resumen Inventario --}}
    <div class="grid grid-cols-3 gap-4 mb-5">

        <div class="bg-blue-100 p-4 rounded shadow">

            <h3 class="font-bold text-lg">
                Productos
            </h3>

            <p class="text-2xl font-bold">
                {{ $productos->count() }}
            </p>

        </div>

        <div class="bg-green-100 p-4 rounded shadow">

            <h3 class="font-bold text-lg">
                Stock Total
            </h3>

            <p class="text-2xl font-bold">
                {{ $productos->sum('stock') }}
            </p>

        </div>

        <div class="bg-red-100 p-4 rounded shadow">

            <h3 class="font-bold text-lg">
                Stock Crítico
            </h3>

            <p class="text-2xl font-bold">
                {{ $productos->where('stock','<=',5)->count() }}
            </p>

        </div>

    </div>

    {{-- Alerta General --}}

    @php
        $productosCriticos = $productos->where('stock','<=',5);
    @endphp

    @if($productosCriticos->count() > 0)

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">

            ⚠ Atención:

            Existen

            <strong>
                {{ $productosCriticos->count() }}
            </strong>

            productos con stock crítico.

        </div>

    @endif

    {{-- Tabla Inventario --}}

    <table class="w-full border border-gray-300">

        <thead>

            <tr class="bg-gray-100">

                <th class="border p-2">
                    Código
                </th>

                <th class="border p-2">
                    Producto
                </th>

                <th class="border p-2">
                    Categoría
                </th>

                <th class="border p-2">
                    Precio
                </th>

                <th class="border p-2">
                    Stock
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($productos as $producto)

                <tr>

                    <td class="border p-2">
                        {{ $producto->codigo }}
                    </td>

                    <td class="border p-2">
                        {{ $producto->nombre }}
                    </td>

                    <td class="border p-2">
                        {{ $producto->categoria }}
                    </td>

                    <td class="border p-2">
                        S/ {{ number_format($producto->precio,2) }}
                    </td>

                    <td class="border p-2 text-center">

                        @if($producto->stock == 0)

                            <span class="bg-red-600 text-white px-3 py-1 rounded font-bold">

                                AGOTADO

                            </span>

                        @elseif($producto->stock <= 5)

                            <span class="bg-red-200 text-red-700 px-3 py-1 rounded font-bold">

                                {{ $producto->stock }} - CRÍTICO

                            </span>

                        @elseif($producto->stock <= 10)

                            <span class="bg-yellow-200 text-yellow-700 px-3 py-1 rounded font-bold">

                                {{ $producto->stock }} - BAJO

                            </span>

                        @else

                            <span class="bg-green-200 text-green-700 px-3 py-1 rounded font-bold">

                                {{ $producto->stock }}

                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="border p-4 text-center">

                        No existen productos registrados.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection