@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- CABECERA -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Clientes
            </h1>

            <p class="text-gray-500 mt-1">
                Gestión de clientes registrados
            </p>

        </div>

        <a href="{{ route('clientes.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition">

            + Nuevo Cliente

        </a>

    </div>

    <!-- TARJETAS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="text-4xl mb-3">
                👥
            </div>

            <p class="text-gray-500">
                Clientes Registrados
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $clientes->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="text-4xl mb-3">
                🪪
            </div>

            <p class="text-gray-500">
                DNI
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $clientes->where('tipo_documento','DNI')->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6">

            <div class="text-4xl mb-3">
                📞
            </div>

            <p class="text-gray-500">
                Con Teléfono
            </p>

            <h2 class="text-4xl font-bold text-purple-600 mt-2">
                {{ $clientes->whereNotNull('telefono')->count() }}
            </h2>

        </div>

    </div>

    <!-- TABLA -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-xl font-bold">
                Lista de Clientes
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="p-4 text-left">
                            Documento
                        </th>

                        <th class="p-4 text-left">
                            Número
                        </th>

                        <th class="p-4 text-left">
                            Cliente
                        </th>

                        <th class="p-4 text-center">
                            Teléfono
                        </th>

                        <th class="p-4 text-center">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($clientes as $cliente)

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="p-4">

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">

                                {{ $cliente->tipo_documento }}

                            </span>

                        </td>

                        <td class="p-4 font-medium text-slate-700">

                            {{ $cliente->numero_documento }}

                        </td>

                        <td class="p-4">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center">

                                    👤

                                </div>

                                <div>

                                    <p class="font-semibold">

                                        {{ $cliente->nombre }}

                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="p-4 text-center">

                            {{ $cliente->telefono }}

                        </td>

                        <td class="p-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('clientes.edit',$cliente->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow transition">

                                    Editar

                                </a>

                                <form action="{{ route('clientes.destroy',$cliente->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('¿Desea eliminar este cliente?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow transition">

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="p-10 text-center text-gray-500">

                            No existen clientes registrados.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection