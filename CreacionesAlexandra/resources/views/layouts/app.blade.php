<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creaciones Alexandra</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-60 bg-slate-900 min-h-screen text-white">

        <div class="p-5 text-2xl font-bold border-b border-slate-700">
            Creaciones Alexandra
        </div>

        <nav class="mt-5">

            <a href="{{ url('/') }}" class="block px-5 py-3 hover:bg-slate-800">
                Dashboard
            </a>

            <a href="{{ route('productos.index') }}" class="block px-5 py-3 hover:bg-slate-800">
                Productos
            </a>

            <a href="{{ route('produccion.index') }}" class="block px-5 py-3 hover:bg-slate-800">
                Producción
            </a>

            <a href="{{ url('/inventario') }}" class="block px-5 py-3 hover:bg-slate-800">
                Inventario
            </a>

            <a href="{{ route('clientes.index') }}" class="block px-5 py-3 hover:bg-slate-800">
                Clientes
            </a>

            <a href="{{ route('ventas.index') }}" class="block px-5 py-3 hover:bg-slate-800">
                Ventas
            </a>

            <a href="{{ route('reportes.index') }}" class="block px-5 py-3 hover:bg-slate-800">
                Reportes
            </a>

        </nav>

    </aside>

    <!-- Contenido -->
    <main class="flex-1 p-6">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('scripts')
</body>
</html>