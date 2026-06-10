@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between mb-5">

        <h2 class="text-2xl font-bold">
            Lista de Ventas
        </h2>

        <a href="{{ route('ventas.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">

            Nueva Venta

        </a>

    </div>

    <table class="w-full border">

        <thead>

            <tr class="bg-gray-100">

                <th class="border p-2">ID</th>
                <th class="border p-2">Fecha</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Estado</th>

            </tr>

        </thead>

        <tbody>

            @foreach($ventas as $venta)

            <tr>

                <td class="border p-2">
                    {{ $venta->id }}
                </td>

                <td class="border p-2">
                    {{ $venta->fecha }}
                </td>

                <td class="border p-2">
                    S/ {{ $venta->total }}
                </td>

                <td class="border p-2">
                    {{ $venta->estado }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection