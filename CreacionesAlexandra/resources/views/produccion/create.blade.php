@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-5">
        Nueva Producción
    </h2>

    <form action="{{ route('produccion.store') }}"
          method="POST">

        @csrf

        <div class="mb-4">

            <label>Producto</label>

            <select
                name="producto_id"
                class="border p-2 rounded w-full">

                @foreach($productos as $producto)

                    <option value="{{ $producto->id }}">
                        {{ $producto->nombre }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label>Cantidad</label>

            <input
                type="number"
                name="cantidad"
                class="border p-2 rounded w-full">

        </div>

        <div class="mb-4">

            <label>Fecha Inicio</label>

            <input
                type="date"
                name="fecha_inicio"
                value="{{ date('Y-m-d') }}"
                class="border p-2 rounded w-full">

        </div>

        <button
            class="bg-green-600 text-white px-4 py-2 rounded">

            Guardar

        </button>

    </form>

</div>

@endsection