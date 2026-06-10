@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

```
<h2 class="text-2xl font-bold mb-5">
    Nuevo Cliente
</h2>

<form action="{{ route('clientes.store') }}" method="POST">

    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label class="block mb-1 font-medium">
                Tipo Documento
            </label>

            <select
                name="tipo_documento"
                id="tipo_documento"
                class="border p-2 rounded w-full">

                <option value="DNI">DNI</option>
                <option value="RUC">RUC</option>

            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">
                Número Documento
            </label>

            <div class="flex gap-2">

                <input
                    type="text"
                    name="numero_documento"
                    id="numero_documento"
                    placeholder="Ingrese DNI o RUC"
                    class="border p-2 rounded w-full">

                <button
                    type="button"
                    id="btnBuscar"
                    class="bg-blue-600 text-white px-4 rounded">

                    Buscar

                </button>

            </div>
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


<script>

document.addEventListener('DOMContentLoaded', function(){

    document.getElementById('btnBuscar').addEventListener('click', function(){

        fetch('/buscar-documento', {

            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ??
                                'ThYtGX2c5gFiYuo3LgqhdniRkMV4DaUjiC2itytR'
            },

            body: JSON.stringify({

                tipo_documento:
                    document.getElementById('tipo_documento').value,

                numero_documento:
                    document.getElementById('numero_documento').value

            })

        })

        .then(response => {

            if(!response.ok){
                throw new Error('Error HTTP: ' + response.status);
            }

            return response.json();

        })

        .then(data => {

            console.log('Respuesta API:', data);

            document.getElementById('nombre').value =
                data.nombre || '';

            if(data.direccion){

                document.getElementById('direccion').value =
                    data.direccion;

            }

        })

        .catch(error => {

            console.error('Error:', error);

            alert('Error consultando documento');

        });

    });

});

</script>