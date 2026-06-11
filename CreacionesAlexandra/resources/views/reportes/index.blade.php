@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <!-- ENCABEZADO -->
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800">
            Reporte de Ventas
        </h1>

        <p class="text-gray-500 mt-1">
            Análisis y seguimiento de ventas realizadas
        </p>

    </div>

    <!-- TARJETAS KPI -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-blue-500">

            <p class="text-gray-500">
                Ventas Totales
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                S/ {{ number_format($ventasTotales,2) }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">

            <p class="text-gray-500">
                Número de Ventas
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $cantidadVentas }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-purple-500">

            <p class="text-gray-500">
                Ticket Promedio
            </p>

            <h2 class="text-4xl font-bold text-purple-600 mt-2">
                S/ {{ number_format($ticketPromedio,2) }}
            </h2>

        </div>

    </div>

    <!-- FILTROS -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">

        <h2 class="text-lg font-bold mb-5">
            Filtros de Reporte
        </h2>

        <form>

            <div class="grid md:grid-cols-4 gap-4">

                <div>

                    <label class="block text-sm font-medium mb-2">
                        Fecha Desde
                    </label>

                    <input
                        type="date"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <div>

                    <label class="block text-sm font-medium mb-2">
                        Fecha Hasta
                    </label>

                    <input
                        type="date"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

                </div>

                <div class="flex items-end">

                    <a href="{{ route('reportes.pdf') }}"
                       class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow-md transition">

                        📄 Generar PDF

                    </a>

                </div>

                <div class="flex items-end">

                    <button
                        type="button"
                        class="w-full bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow-md transition">

                        📊 Exportar Excel

                    </button>

                </div>

            </div>

        </form>

    </div>

    <!-- GRAFICO + RESUMEN -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- GRAFICO -->
        <div class="lg:col-span-3 bg-white rounded-2xl shadow-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-xl font-bold">
                    Ventas por Día
                </h2>

                <span class="text-sm text-gray-500">
                    Últimos movimientos
                </span>

            </div>

            <canvas id="ventasChart" height="120"></canvas>

        </div>

        <!-- RESUMEN -->
        <div class="bg-white rounded-2xl shadow-lg p-6">

            <h2 class="text-xl font-bold mb-6">
                Resumen General
            </h2>

            <div class="space-y-6">

                <div>

                    <p class="text-gray-500 text-sm">
                        Facturación
                    </p>

                    <h3 class="text-2xl font-bold text-blue-600">
                        S/ {{ number_format($ventasTotales,2) }}
                    </h3>

                </div>

                <div>

                    <p class="text-gray-500 text-sm">
                        Ventas Registradas
                    </p>

                    <h3 class="text-2xl font-bold text-green-600">
                        {{ $cantidadVentas }}
                    </h3>

                </div>

                <div>

                    <p class="text-gray-500 text-sm">
                        Ticket Promedio
                    </p>

                    <h3 class="text-2xl font-bold text-purple-600">
                        S/ {{ number_format($ticketPromedio,2) }}
                    </h3>

                </div>

                <hr>

                <div>

                    <p class="text-gray-500 text-sm">
                        Estado del Negocio
                    </p>
            <br>
                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">

                        ✔ Operativo

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

const ctx =
document.getElementById('ventasChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            '1','2','3','4','5',
            '6','7','8','9','10'
        ],

        datasets: [{

            label: 'Ventas (S/)',

            data: [
                500,
                1200,
                800,
                1500,
                2100,
                1700,
                1300,
                2200,
                1900,
                2500
            ],

            backgroundColor:
                'rgba(59,130,246,0.7)',

            borderRadius: 10

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: true

            }

        }

    }

});

</script>

@endpush