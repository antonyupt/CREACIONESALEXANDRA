@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">
<h2 class="text-2xl font-bold mb-5">
    Nuevo Cliente
</h2>

<form action="{{ route('clientes.store') }}" method="POST">

    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label class="block mb-1 font-medium">
                Número Documento
            </label>

            <input
                type="text"
                name="numero_documento"
                id="numero_documento"
                placeholder="Ingrese DNI o RUC"
                class="border p-2 rounded w-full">
        </div>

        <div class="col-span-2">
            <label class="block mb-1 font-medium">
                Nombre / Razón Social
            </label>

            <input
                type="text"
                name="nombre"
                id="nombre"
                class="border p-2 rounded w-full">
        </div>

        <input
            type="text"
            name="telefono"
            placeholder="Teléfono"
            class="border p-2 rounded">

        <input
            type="email"
            name="correo"
            placeholder="Correo"
            class="border p-2 rounded">

        <div class="col-span-2">
            <input
                type="text"
                name="direccion"
                id="direccion"
                placeholder="Dirección"
                class="border p-2 rounded w-full">
        </div>

    </div>

    <button
        class="bg-green-600 text-white px-5 py-2 rounded mt-5">

        Guardar Cliente

    </button>

</form>
```

</div>

@endsection