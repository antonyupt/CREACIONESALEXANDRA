@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-5">

        <h2 class="text-2xl font-bold">
            Producción
        </h2>

        <a href="{{ route('produccion.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

            Nueva Producción

        </a>

    </div>

    <table class="w-full border">

        <thead>

            <tr class="bg-gray-100">

                <th class="border p-2">Producto</th>
                <th class="border p-2">Cantidad</th>
                <th class="border p-2">Inicio</th>
                <th class="border p-2">Fin</th>
                <th class="border p-2">Estado</th>
                <th class="border p-2">Acciones</th>

            </tr>

        </thead>

        <tbody>

            @forelse($producciones as $p)

                <tr>

                    <td class="border p-2">
                        {{ $p->producto->nombre }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ $p->cantidad }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ $p->fecha_inicio }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ $p->fecha_fin ?? '-' }}
                    </td>

                    <td class="border p-2 text-center">

                        @if($p->estado == 'Pendiente')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                                🔴 Pendiente
                            </span>

                        @elseif($p->estado == 'En Producción')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                                🟡 En Producción
                            </span>

                        @elseif($p->estado == 'Terminado')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                🟢 Terminado
                            </span>

                        @endif

                    </td>

                    <td class="border p-2 text-center">

                        @if($p->estado != 'Terminado')

                            <a href="{{ route('produccion.terminar', $p->id) }}"
                               class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">

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
                        class="border p-4 text-center text-gray-500">

                        No existen producciones registradas.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection