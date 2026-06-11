

@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- CABECERA -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">

            <h1 class="text-3xl font-bold text-white">
                Nuevo Cliente
            </h1>

            <p class="text-blue-100 mt-1">
                Registra información de clientes para ventas y comprobantes
            </p>

        </div>

        <!-- FORMULARIO -->
        <div class="p-8">

            <form action="{{ route('clientes.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Documento -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Número de Documento
                        </label>

                        <input
                            type="text"
                            name="numero_documento"
                            id="numero_documento"
                            placeholder="Ingrese DNI o RUC"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                    <!-- Teléfono -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Teléfono
                        </label>

                        <input
                            type="text"
                            name="telefono"
                            placeholder="987654321"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                    <!-- Nombre -->
                    <div class="md:col-span-2">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nombre / Razón Social
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            placeholder="Ingrese nombre completo"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                    <!-- Correo -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Correo Electrónico
                        </label>

                        <input
                            type="email"
                            name="correo"
                            placeholder="correo@ejemplo.com"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                    <!-- Dirección -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Dirección
                        </label>

                        <input
                            type="text"
                            name="direccion"
                            id="direccion"
                            placeholder="Ingrese dirección"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                </div>

                <!-- BOTONES -->
                <div class="flex gap-4 mt-8">

                    <button
                        type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl shadow-md transition">

                        💾 Guardar Cliente

                    </button>

                    <a href="{{ route('clientes.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-3 rounded-xl transition">

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection