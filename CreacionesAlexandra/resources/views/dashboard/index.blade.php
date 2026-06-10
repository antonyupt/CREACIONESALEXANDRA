@extends('layouts.app')

@section('content')

<div class="grid grid-cols-4 gap-4">

    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="text-gray-500">Ventas del mes</h2>
        <p class="text-3xl font-bold">S/ 15,250</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="text-gray-500">Pedidos</h2>
        <p class="text-3xl font-bold">23</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="text-gray-500">Stock Bajo</h2>
        <p class="text-3xl font-bold">8</p>
    </div>

    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="text-gray-500">Clientes</h2>
        <p class="text-3xl font-bold">125</p>
    </div>

</div>

@endsection