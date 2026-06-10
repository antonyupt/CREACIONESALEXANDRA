<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creaciones Alexandra</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white min-h-screen">

        <div class="p-5 text-xl font-bold border-b border-slate-700">
            Creaciones Alexandra
        </div>

        <nav class="mt-5">

            <a href="/" class="block px-5 py-3 hover:bg-slate-800">
                Dashboard
            </a>

            <a href="/productos" class="block px-5 py-3 hover:bg-slate-800">
                Productos
            </a>

            <a href="/produccion" class="block px-5 py-3 hover:bg-slate-800">
                Producción
            </a>

            <a href="/inventario" class="block px-5 py-3 hover:bg-slate-800">
                Inventario
            </a>

            <a href="/clientes" class="block px-5 py-3 hover:bg-slate-800">
                Clientes
            </a>

            <a href="{{ route('ventas.index') }}"
               class="block px-5 py-3 hover:bg-slate-800">
                Ventas
            </a>

            <a href="#" class="block px-5 py-3 hover:bg-slate-800">
                Comprobantes
            </a>

            <a href="#" class="block px-5 py-3 hover:bg-slate-800">
                Reportes
            </a>

        </nav>

    </aside>

    <!-- Contenido -->
    <main class="flex-1">

        <header class="bg-white shadow p-5 flex justify-between">

            <h1 class="font-bold text-xl">
                Dashboard
            </h1>

            <div>
                Administrador
            </div>

        </header>

        <div class="p-6">

            {{-- Mensajes de éxito --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Mensajes de error --}}
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </div>

    </main>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
</body>
</html>