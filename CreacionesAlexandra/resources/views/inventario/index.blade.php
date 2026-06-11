@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- CABECERA -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Inventario
        </h1>

        <p class="text-gray-500 mt-1">
            Control de stock y productos disponibles
        </p>

    </div>

    @php
        $productosCriticos = $productos->where('stock','<=',5);
    @endphp

    <!-- TARJETAS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="text-4xl mb-3">
                📦
            </div>

            <p class="text-gray-500">
                Productos Registrados
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $productos->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="text-4xl mb-3">
                📊
            </div>

            <p class="text-gray-500">
                Stock Total
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $productos->sum('stock') }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="text-4xl mb-3">
                ⚠️
            </div>

            <p class="text-gray-500">
                Stock Crítico
            </p>

            <h2 class="text-4xl font-bold text-red-600 mt-2">
                {{ $productosCriticos->count() }}
            </h2>

        </div>

    </div>

    <!-- ALERTA -->
    @if($productosCriticos->count() > 0)

    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">

        <div class="flex items-center gap-3">

            <span class="text-red-600 text-xl">
                ⚠️
            </span>

            <span class="text-red-700 font-medium">

                Existen

                <strong>
                    {{ $productosCriticos->count() }}
                </strong>

                productos con stock crítico.

            </span>

        </div>

    </div>

    @endif

    <!-- TABLA -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-xl font-bold">
                Stock de Productos
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-4 text-left">
                            Código
                        </th>

                        <th class="p-4 text-left">
                            Producto
                        </th>

                        <th class="p-4 text-left">
                            Categoría
                        </th>

                        <th class="p-4 text-center">
                            Precio
                        </th>

                        <th class="p-4 text-center">
                            Stock
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($productos as $producto)

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="p-4 font-medium text-slate-700">
                            {{ $producto->codigo }}
                        </td>

                        <td class="p-4">

                            <div class="flex items-center gap-3">

                                @if($producto->imagen)

                                    <img
                                        src="{{ asset('storage/'.$producto->imagen) }}"
                                        class="w-12 h-12 rounded-lg object-cover">

                                @else

                                   
                                @endif

                                <span class="font-semibold">

                                    {{ $producto->nombre }}

                                </span>

                            </div>

                        </td>

                        <td class="p-4">
                            {{ $producto->categoria }}
                        </td>

                        <td class="p-4 text-center font-semibold text-green-600">

                            S/ {{ number_format($producto->precio,2) }}

                        </td>

                        <td class="p-4 text-center">

                            @if($producto->stock == 0)

                                <span class="bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold">

                                    Agotado

                                </span>

                            @elseif($producto->stock <= 5)

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">

                                    {{ $producto->stock }} - Crítico

                                </span>

                            @elseif($producto->stock <= 10)

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">

                                    {{ $producto->stock }} - Bajo

                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">

                                    {{ $producto->stock }}

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="p-10 text-center text-gray-500">

                            No existen productos registrados.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection