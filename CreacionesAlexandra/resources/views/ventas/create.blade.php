@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-5">
        Nueva Venta
    </h2>

    <form action="{{ route('ventas.store') }}" method="POST">

        @csrf

        <div class="grid grid-cols-2 gap-4 mb-5">

            <div>
                <label class="block mb-1">
                    Cliente
                </label>

                <select
                    name="cliente_id"
                    id="cliente_id"
                    class="border p-2 rounded w-full">

                    <option value="">
                        Seleccione un cliente
                    </option>

                    @foreach($clientes as $cliente)

                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div>
                <label class="block mb-1">
                    Fecha
                </label>

                <input
                    type="date"
                    name="fecha"
                    id="fecha"
                    value="{{ date('Y-m-d') }}"
                    class="border p-2 rounded w-full">
            </div>

        </div>

        <hr class="my-5">

        <div class="grid grid-cols-3 gap-4">

            <select
                id="producto"
                class="border p-2 rounded">

                <option value="">
                    Seleccione producto
                </option>

                @foreach($productos as $producto)

                    <option
                        value="{{ $producto->id }}"
                        data-precio="{{ $producto->precio }}">

                        {{ $producto->nombre }}

                    </option>

                @endforeach

            </select>

            <input
                type="number"
                id="cantidad"
                placeholder="Cantidad"
                min="1"
                class="border p-2 rounded">

            <button
                type="button"
                id="btnAgregar"
                class="bg-blue-600 text-white rounded">

                Agregar

            </button>

        </div>

        <table class="w-full mt-5 border">

            <thead>

                <tr class="bg-gray-100">

                    <th class="border p-2">Producto</th>
                    <th class="border p-2">Cantidad</th>
                    <th class="border p-2">Precio</th>
                    <th class="border p-2">Subtotal</th>

                </tr>

            </thead>

            <tbody id="detalleVenta">

            </tbody>

        </table>

        <div class="text-right mt-5">

            <h3 class="text-xl font-bold">
                Total: S/
                <span id="totalVenta">0.00</span>
            </h3>

        </div>

        <input
            type="hidden"
            name="productos"
            id="productosInput">

        <input
            type="hidden"
            name="total"
            id="totalInput">

        <button
            type="submit"
            class="bg-green-600 text-white px-5 py-2 rounded mt-5">

            Guardar Venta

        </button>

    </form>

</div>

<script>

let productosVenta = [];
let total = 0;

document.getElementById('btnAgregar').addEventListener('click', () => {

    let producto = document.getElementById('producto');
    let cantidad = document.getElementById('cantidad').value;

    if (!producto.value || !cantidad) {

        alert('Seleccione producto y cantidad');
        return;
    }

    let nombre =
        producto.options[producto.selectedIndex].text;

    let precio =
        parseFloat(
            producto.options[producto.selectedIndex]
            .dataset.precio
        );

    let subtotal = precio * cantidad;

    productosVenta.push({

        producto_id: producto.value,
        cantidad: cantidad,
        precio: precio,
        subtotal: subtotal

    });

    document.getElementById('detalleVenta').innerHTML += `

        <tr>

            <td class="border p-2">${nombre}</td>

            <td class="border p-2">${cantidad}</td>

            <td class="border p-2">
                S/ ${precio.toFixed(2)}
            </td>

            <td class="border p-2">
                S/ ${subtotal.toFixed(2)}
            </td>

        </tr>

    `;

    total += subtotal;

    document.getElementById('totalVenta').innerText =
        total.toFixed(2);

    document.getElementById('productosInput').value =
        JSON.stringify(productosVenta);

    document.getElementById('totalInput').value =
        total.toFixed(2);

    document.getElementById('cantidad').value = '';

});

</script>

@endsection