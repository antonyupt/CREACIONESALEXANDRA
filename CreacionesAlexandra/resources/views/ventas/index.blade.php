@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- CABECERA -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Ventas
            </h1>

            <p class="text-gray-500 mt-1">
                Gestión y seguimiento de ventas realizadas
            </p>

        </div>

        <a href="{{ route('ventas.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition">

            + Nueva Venta

        </a>

    </div>

    <!-- TARJETAS RESUMEN -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-md p-6">

            <p class="text-gray-500">
                Total Ventas
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $ventas->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <p class="text-gray-500">
                Monto Total
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                S/ {{ number_format($ventas->sum('total'),2) }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <p class="text-gray-500">
                Pendientes
            </p>

            <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                {{ $ventas->where('estado','Pendiente')->count() }}
            </h2>

        </div>

    </div>

    <!-- TABLA -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-xl font-bold">
                Historial de Ventas
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-4 text-center">
                            ID
                        </th>

                        <th class="p-4 text-center">
                            Fecha
                        </th>

                        <th class="p-4 text-center">
                            Total
                        </th>

                        <th class="p-4 text-center">
                            Estado
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($ventas as $venta)

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="p-4 text-center font-semibold">
                            #{{ $venta->id }}
                        </td>

                        <td class="p-4 text-center">
                            {{ $venta->fecha }}
                        </td>

                        <td class="p-4 text-center font-bold text-green-600">
                            S/ {{ number_format($venta->total,2) }}
                        </td>

                        <td class="p-4 text-center">

                            @if($venta->estado == 'Pendiente')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    🟡 Pendiente
                                </span>

                            @elseif($venta->estado == 'Pagado')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    🟢 Pagado
                                </span>

                            @elseif($venta->estado == 'Anulado')

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    🔴 Anulado
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="p-10 text-center text-gray-500">

                            No existen ventas registradas.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection