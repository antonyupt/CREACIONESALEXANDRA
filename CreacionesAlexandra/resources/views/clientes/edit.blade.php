@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold mb-5">
        Editar Cliente
    </h2>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">

            <input
                type="text"
                name="tipo_documento"
                value="{{ $cliente->tipo_documento }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="numero_documento"
                value="{{ $cliente->numero_documento }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="nombre"
                value="{{ $cliente->nombre }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="telefono"
                value="{{ $cliente->telefono }}"
                class="border p-2 rounded">

            <input
                type="email"
                name="correo"
                value="{{ $cliente->correo }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="direccion"
                value="{{ $cliente->direccion }}"
                class="border p-2 rounded">

        </div>

        <div class="mt-5 flex gap-3">

            <button
                type="submit"
                class="bg-yellow-500 text-white px-5 py-2 rounded">

                Actualizar Cliente

            </button>

            <a href="{{ route('clientes.index') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded">

                Cancelar

            </a>

        </div>

    </form>

</div>

@endsection