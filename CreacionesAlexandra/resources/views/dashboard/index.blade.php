@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Dashboard
</h1>

<!-- TARJETAS -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
        <div class="bg-green-500 text-white w-14 h-14 rounded-xl flex items-center justify-center text-2xl">
            💰
        </div>

        <div>
            <p class="text-gray-500">
                Ventas del Mes
            </p>

            <h2 class="text-3xl font-bold text-green-600">
                S/ {{ number_format($ventasMes,2) }}
            </h2>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
        <div class="bg-purple-500 text-white w-14 h-14 rounded-xl flex items-center justify-center text-2xl">
            📦
        </div>

        <div>
            <p class="text-gray-500">
                Pedidos Pendientes
            </p>

            <h2 class="text-3xl font-bold text-purple-600">
                {{ $pedidosPendientes }}
            </h2>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
        <div class="bg-red-500 text-white w-14 h-14 rounded-xl flex items-center justify-center text-2xl">
            ⚠️
        </div>

        <div>
            <p class="text-gray-500">
                Stock Bajo
            </p>

            <h2 class="text-3xl font-bold text-red-600">
                {{ $stockBajo }}
            </h2>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
        <div class="bg-blue-500 text-white w-14 h-14 rounded-xl flex items-center justify-center text-2xl">
            👤
        </div>

        <div>
            <p class="text-gray-500">
                Clientes Registrados
            </p>

            <h2 class="text-3xl font-bold text-blue-600">
                {{ $clientes }}
            </h2>
        </div>
    </div>

</div>

<!-- GRAFICO + PRODUCTOS -->
<div class="grid grid-cols-1 xl:grid-cols-4 gap-6">

    <!-- GRAFICO -->
    <div class="xl:col-span-3 bg-white rounded-xl shadow p-6">

        <h2 class="font-bold text-xl mb-4">
            Ventas de los últimos meses
        </h2>

        <div style="height:350px;">
            <canvas id="ventasChart"></canvas>
        </div>

    </div>

    <!-- PRODUCTOS MAS VENDIDOS -->
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="font-bold text-xl mb-4">
            Productos más vendidos
        </h2>

        <div class="space-y-4 max-h-[350px] overflow-y-auto">

            @forelse($productosMasVendidos as $producto)

                <div class="flex items-center justify-between border-b pb-3">

                    <div>

                        <p class="font-semibold">
                            {{ $producto->producto->nombre }}
                        </p>

                        <small class="text-gray-500">
                            {{ $producto->total }} unidades
                        </small>

                    </div>

                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">
                        Top
                    </span>

                </div>

            @empty

                <p class="text-gray-500">
                    No existen ventas registradas.
                </p>

            @endforelse

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('ventasChart');

    if (!ctx) return;

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: [
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio'
            ],

            datasets: [{

                label: 'Ventas',

                data: [
                    300,
                    450,
                    500,
                    700,
                    650,
                    875
                ],

                borderColor: '#4F46E5',
                backgroundColor: '#4F46E5',
                borderWidth: 4,
                tension: 0.4,
                fill: false

            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                }
            },

            scales: {

                y: {
                    beginAtZero: true
                }
            }
        }
    });

});

</script>

@endpush