@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold mb-5">
        Nuevo Producto
    </h2>

    <form action="{{ route('productos.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-4">

            <input
                type="text"
                name="codigo"
                placeholder="Código"
                class="border p-2 rounded">

            <input
                type="text"
                name="nombre"
                placeholder="Nombre"
                class="border p-2 rounded">

            <input
                type="text"
                name="categoria"
                placeholder="Categoría"
                class="border p-2 rounded">

            <input
                type="text"
                name="talla"
                placeholder="Talla"
                class="border p-2 rounded">

            <input
                type="text"
                name="color"
                placeholder="Color"
                class="border p-2 rounded">

            <input
                type="number"
                step="0.01"
                name="precio"
                placeholder="Precio"
                class="border p-2 rounded">

            <input
                type="number"
                name="stock"
                placeholder="Stock"
                class="border p-2 rounded">

        </div>

        <button
            class="bg-green-600 text-white px-5 py-2 rounded mt-5">

            Guardar Producto

        </button>

    </form>

</div>

@endsection