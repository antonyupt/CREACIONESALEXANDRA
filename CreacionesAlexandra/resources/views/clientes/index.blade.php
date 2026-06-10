@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Clientes
        </h2>

        <a href="{{ route('clientes.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">

            + Nuevo Cliente

        </a>

    </div>

    <table class="w-full border">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3">Documento</th>
                <th class="p-3">Número</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Teléfono</th>
                <th class="p-3">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @foreach($clientes as $cliente)

            <tr class="border-t">

                <td class="p-3">{{ $cliente->tipo_documento }}</td>

                <td class="p-3">{{ $cliente->numero_documento }}</td>

                <td class="p-3">{{ $cliente->nombre }}</td>

                <td class="p-3">{{ $cliente->telefono }}</td>

                <td class="p-3 flex gap-2">

                    <a href="{{ route('clientes.edit',$cliente->id) }}"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">

                        Editar

                    </a>

                    <form action="{{ route('clientes.destroy',$cliente->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-600 text-white px-3 py-1 rounded">

                            Eliminar

                        </button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection