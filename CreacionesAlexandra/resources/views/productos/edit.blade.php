@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold mb-5">
        Editar Producto
    </h2>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">

            <input
                type="text"
                name="codigo"
                value="{{ $producto->codigo }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="nombre"
                value="{{ $producto->nombre }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="categoria"
                value="{{ $producto->categoria }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="talla"
                value="{{ $producto->talla }}"
                class="border p-2 rounded">

            <input
                type="text"
                name="color"
                value="{{ $producto->color }}"
                class="border p-2 rounded">

            <input
                type="number"
                step="0.01"
                name="precio"
                value="{{ $producto->precio }}"
                class="border p-2 rounded">

            <input
                type="number"
                name="stock"
                value="{{ $producto->stock }}"
                class="border p-2 rounded">

        </div>

        <div class="mt-5 flex gap-3">

            <button
                type="submit"
                class="bg-yellow-500 text-white px-5 py-2 rounded">

                Actualizar

            </button>

            <a href="{{ route('productos.index') }}"
               class="bg-gray-500 text-white px-5 py-2 rounded">

               Cancelar

            </a>

        </div>

    </form>

</div>

@endsection