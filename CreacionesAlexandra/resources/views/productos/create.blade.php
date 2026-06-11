@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- CABECERA -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Nuevo Producto
            </h1>

            <p class="text-gray-500 mt-1">
                Registra un nuevo producto en el sistema
            </p>

        </div>

        <a href="{{ route('productos.index') }}"
           class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">

            ← Volver

        </a>

    </div>

    <!-- FORMULARIO -->
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <form action="{{ route('productos.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <!-- CODIGO -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Código
                    </label>

                    <input
                        type="text"
                        name="codigo"
                        placeholder="Ejemplo: P001"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <!-- NOMBRE -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre del producto"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <!-- CATEGORIA -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Categoría
                    </label>

                    <input
                        type="text"
                        name="categoria"
                        placeholder="Polos, Casacas..."
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <!-- TALLA -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Talla
                    </label>

                    <select
                        name="talla"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <option value="">Seleccionar talla</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL</option>

                    </select>

                </div>

                <!-- COLOR -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Color
                    </label>

                    <input
                        type="text"
                        name="color"
                        placeholder="Color"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- PRECIO -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Precio
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="precio"
                        placeholder="0.00"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- STOCK -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Stock Inicial
                    </label>

                    <input
                        type="number"
                        name="stock"
                        placeholder="0"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

                <!-- IMAGEN -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Imagen
                    </label>

                    <input
                        type="file"
                        name="imagen"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3">

                </div>

            </div>

            <!-- BOTONES -->
            <div class="flex gap-4 mt-8">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl shadow">

                    💾 Guardar Producto

                </button>

                <a href="{{ route('productos.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 px-8 py-3 rounded-xl">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection