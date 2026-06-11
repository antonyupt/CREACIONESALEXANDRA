@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- CABECERA -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Producción
            </h1>

            <p class="text-gray-500 mt-1">
                Control y seguimiento de órdenes de producción
            </p>

        </div>

        <a href="{{ route('produccion.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition">

            + Nueva Producción

        </a>

    </div>

    <!-- TARJETAS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-2xl shadow-md p-6">
        <p class="text-gray-500">Total Producciones</p>
        <h2 class="text-4xl font-bold text-blue-600 mt-2">
            {{ $producciones->count() }}
        </h2>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">
        <p class="text-gray-500">Pendientes</p>
        <h2 class="text-4xl font-bold text-red-500 mt-2">
            {{ $producciones->where('estado','Pendiente')->count() }}
        </h2>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">
        <p class="text-gray-500">En Producción</p>
        <h2 class="text-4xl font-bold text-yellow-500 mt-2">
            {{ $producciones->where('estado','En Producción')->count() }}
        </h2>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">
        <p class="text-gray-500">Terminadas</p>
        <h2 class="text-4xl font-bold text-green-600 mt-2">
            {{ $producciones->where('estado','Terminado')->count() }}
        </h2>
    </div>

</div>

    <!-- TABLA -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-xl font-bold">
                Órdenes de Producción
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-4 text-left">
                            Producto
                        </th>

                        <th class="p-4 text-center">
                            Cantidad
                        </th>

                        <th class="p-4 text-center">
                            Inicio
                        </th>

                        <th class="p-4 text-center">
                            Fin
                        </th>

                        <th class="p-4 text-center">
                            Estado
                        </th>

                       
                    </tr>

                </thead>

                <tbody>

                    @forelse($producciones as $p)

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="p-4">

                            <div class="font-semibold">
                                {{ $p->producto->nombre }}
                            </div>

                        </td>

                        <td class="p-4 text-center font-semibold">
                            {{ $p->cantidad }}
                        </td>

                        <td class="p-4 text-center">
                            {{ $p->fecha_inicio }}
                        </td>

                        <td class="p-4 text-center">
                            {{ $p->fecha_fin ?? '-' }}
                        </td>

                    <td class="p-4 text-center">

    @if($p->estado == 'Pendiente')

        <a href="{{ route('produccion.iniciar', $p->id) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow transition">

            Iniciar

        </a>

    @elseif($p->estado == 'En Producción')

        <a href="{{ route('produccion.terminar', $p->id) }}"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition">

            Finalizar

        </a>

    @else

        <span class="text-green-600 font-bold">
            ✓ Completado
        </span>

    @endif

</td>

                     

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="p-10 text-center text-gray-500">

                            No existen producciones registradas.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection