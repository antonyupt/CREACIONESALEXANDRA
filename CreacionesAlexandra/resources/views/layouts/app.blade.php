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

            <a href="#" class="block px-5 py-3 hover:bg-slate-800">
                Dashboard
            </a>

            <a href="#" class="block px-5 py-3 hover:bg-slate-800">
                Productos
            </a>

            <a href="/productos" class="block px-5 py-3 hover:bg-slate-800">
                Producción
            </a>

            <a href="#" class="block px-5 py-3 hover:bg-slate-800">
                Inventario
            </a>

            <a href="/clientes"
   class="block px-5 py-3 hover:bg-slate-800">
    Clientes
</a>

            <a href="#" class="block px-5 py-3 hover:bg-slate-800">
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

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>