@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- CABECERA -->
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Nueva Producción
            </h1>

            <p class="text-gray-500 mt-1">
                Registra una nueva orden de producción
            </p>

        </div>

        <a href="{{ route('produccion.index') }}"
           class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">

            ← Volver

        </a>

    </div>

    <!-- FORMULARIO -->
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <form action="{{ route('produccion.store') }}"
              method="POST">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <!-- PRODUCTO -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Producto
                    </label>

                    <select
                        name="producto_id"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                        <option value="">
                            Seleccionar producto
                        </option>

                        @foreach($productos as $producto)

                            <option value="{{ $producto->id }}">
                                {{ $producto->nombre }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- CANTIDAD -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Cantidad a producir
                    </label>

                    <input
                        type="number"
                        name="cantidad"
                        min="1"
                        required
                        placeholder="Ingrese cantidad"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <!-- FECHA -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Fecha de inicio
                    </label>

                    <input
                        type="date"
                        name="fecha_inicio"
                        value="{{ date('Y-m-d') }}"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <!-- ESTADO -->
                <div>

                    <label class="block mb-2 font-semibold text-gray-700">
                        Estado Inicial
                    </label>

                    <input
                        type="text"
                        value="Pendiente"
                        readonly
                        class="w-full bg-gray-100 border border-gray-300 rounded-xl px-4 py-3">

                </div>

            </div>

            <!-- RESUMEN -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-5">

                <h3 class="font-semibold text-blue-700 mb-2">
                    Información
                </h3>

                <p class="text-gray-600 text-sm">
                    Al guardar esta producción se registrará automáticamente
                    con estado <strong>Pendiente</strong>. Posteriormente
                    podrás cambiarla a <strong>En Producción</strong> o
                    <strong>Terminada</strong>.
                </p>

            </div>

            <!-- BOTONES -->
            <div class="flex gap-4 mt-8">

                <button
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl shadow-lg">

                    ✅ Registrar Producción

                </button>

                <a href="{{ route('produccion.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 px-8 py-3 rounded-xl">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection