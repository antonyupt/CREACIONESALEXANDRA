@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Nueva Venta
        </h1>

        <p class="text-gray-500 mt-1">
            Registro de ventas y generación de pedidos
        </p>

    </div>

    <form action="{{ route('ventas.store') }}" method="POST">

        @csrf

        <!-- DATOS GENERALES -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">

            <h2 class="text-lg font-bold mb-5">
                Información General
            </h2>

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Cliente
                    </label>

                    <select
                        name="cliente_id"
                        id="cliente_id"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

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

                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Fecha
                    </label>

                    <input
                        type="date"
                        name="fecha"
                        value="{{ date('Y-m-d') }}"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

            </div>

        </div>

        <!-- AGREGAR PRODUCTOS -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">

            <h2 class="text-lg font-bold mb-5">
                Agregar Productos
            </h2>

            <div class="grid md:grid-cols-3 gap-4">

                <select
                    id="producto"
                    class="border border-gray-300 rounded-xl px-4 py-3">

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
                    min="1"
                    placeholder="Cantidad"
                    class="border border-gray-300 rounded-xl px-4 py-3">

                <button
                    type="button"
                    id="btnAgregar"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold">

                    + Agregar Producto

                </button>

            </div>

        </div>

        <!-- DETALLE -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <div class="p-6 border-b">

                <h2 class="text-lg font-bold">
                    Detalle de Venta
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-100">

                        <tr>

                            <th class="p-4 text-left">
                                Producto
                            </th>

                            <th class="p-4 text-center">
                                Cantidad
                            </th>

                            <th class="p-4 text-center">
                                Precio
                            </th>

                            <th class="p-4 text-center">
                                Subtotal
                            </th>

                            <th class="p-4 text-center">
                                Acción
                            </th>

                        </tr>

                    </thead>

                    <tbody id="detalleVenta">

                        <tr id="sinProductos">

                            <td colspan="5"
                                class="text-center p-8 text-gray-400">

                                No hay productos agregados

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="bg-slate-50 p-6 flex justify-between items-center">

                <div>

                    <span class="text-gray-500">
                        Total de la venta
                    </span>

                </div>

                <div>

                    <span class="text-3xl font-bold text-green-600">

                        S/ <span id="totalVenta">0.00</span>

                    </span>

                </div>

            </div>

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
            class="mt-6 bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-xl shadow-lg font-semibold">

            Guardar Venta

        </button>

    </form>

</div>

<script>

let productosVenta = [];
let total = 0;

function actualizarTabla()
{
    let tbody = document.getElementById('detalleVenta');

    if(productosVenta.length === 0)
    {
        tbody.innerHTML = `
            <tr id="sinProductos">
                <td colspan="5" class="text-center p-8 text-gray-400">
                    No hay productos agregados
                </td>
            </tr>
        `;

        return;
    }

    tbody.innerHTML = '';

    productosVenta.forEach((item,index)=>{

        tbody.innerHTML += `
        <tr class="border-b hover:bg-slate-50">

            <td class="p-4">${item.nombre}</td>

            <td class="p-4 text-center">
                ${item.cantidad}
            </td>

            <td class="p-4 text-center">
                S/ ${item.precio.toFixed(2)}
            </td>

            <td class="p-4 text-center">
                S/ ${item.subtotal.toFixed(2)}
            </td>

            <td class="p-4 text-center">

                <button
                    type="button"
                    onclick="eliminarProducto(${index})"
                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">

                    Eliminar

                </button>

            </td>

        </tr>
        `;
    });
}

function eliminarProducto(index)
{
    total -= productosVenta[index].subtotal;

    productosVenta.splice(index,1);

    document.getElementById('totalVenta').innerText =
        total.toFixed(2);

    document.getElementById('productosInput').value =
        JSON.stringify(productosVenta);

    document.getElementById('totalInput').value =
        total.toFixed(2);

    actualizarTabla();
}

document.getElementById('btnAgregar').addEventListener('click',()=>{

    let producto = document.getElementById('producto');
    let cantidad = parseInt(
        document.getElementById('cantidad').value
    );

    if(!producto.value || !cantidad)
    {
        alert('Seleccione producto y cantidad');
        return;
    }

    let nombre =
        producto.options[
            producto.selectedIndex
        ].text;

    let precio =
        parseFloat(
            producto.options[
                producto.selectedIndex
            ].dataset.precio
        );

    let subtotal = precio * cantidad;

    productosVenta.push({

        producto_id : producto.value,
        nombre : nombre,
        cantidad : cantidad,
        precio : precio,
        subtotal : subtotal

    });

    total += subtotal;

    document.getElementById('totalVenta').innerText =
        total.toFixed(2);

    document.getElementById('productosInput').value =
        JSON.stringify(productosVenta);

    document.getElementById('totalInput').value =
        total.toFixed(2);

    actualizarTabla();

    document.getElementById('cantidad').value = '';
});

</script>

@endsection