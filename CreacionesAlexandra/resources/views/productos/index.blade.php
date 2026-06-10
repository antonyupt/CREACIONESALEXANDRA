@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Productos
        </h2>

        <a href="{{ route('productos.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Nuevo Producto
        </a>

    </div>

    <table class="w-full border">

        <thead class="bg-gray-100">

            <tr>
                <th class="p-3">Código</th>
                <th class="p-3">Nombre</th>
                <th class="p-3">Categoría</th>
                <th class="p-3">Precio</th>
                <th class="p-3">Stock</th>
                <th class="p-3">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @foreach($productos as $producto)

            <tr class="border-t">

                <td class="p-3">{{ $producto->codigo }}</td>

                <td class="p-3">{{ $producto->nombre }}</td>

                <td class="p-3">{{ $producto->categoria }}</td>

                <td class="p-3">S/ {{ $producto->precio }}</td>

                <td class="p-3">{{ $producto->stock }}</td>

                <td class="p-3 flex gap-2">

    <a href="{{ route('productos.edit', $producto->id) }}"
       class="bg-yellow-500 text-white px-3 py-1 rounded">

        Editar

    </a>

    <form action="{{ route('productos.destroy', $producto->id) }}"
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