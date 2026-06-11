<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Creaciones Alexandra</title>

    @vite(['resources/css/app.css'])

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900">

<div class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2">

        <!-- PANEL IZQUIERDO -->
        <div class="hidden md:flex flex-col justify-center bg-gradient-to-br from-blue-700 to-indigo-800 text-white p-12">

            <div class="mb-8">

               

                <h1 class="text-4xl font-bold mb-4">
                    Creaciones Alexandra
                </h1>

                <p class="text-blue-100 text-lg leading-relaxed">
                    Sistema de gestión para producción, ventas,
                    inventario, clientes y reportes.
                </p>

            </div>

            <div class="space-y-4 text-blue-100">

                <div class="flex items-center gap-3">
                    ✓ Control de Producción
                </div>

                <div class="flex items-center gap-3">
                    ✓ Gestión de Inventario
                </div>

                <div class="flex items-center gap-3">
                    ✓ Control de Ventas
                </div>

                <div class="flex items-center gap-3">
                    ✓ Reportes en PDF
                </div>

            </div>

        </div>

        <!-- PANEL DERECHO -->
        <div class="p-10 md:p-14">

            <div class="text-center mb-10">

                <h2 class="text-3xl font-bold text-slate-800">
                    Bienvenido
                </h2>

                <p class="text-gray-500 mt-2">
                    Inicia sesión para continuar
                </p>

            </div>

            @if(session('error'))

                <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">

                    {{ session('error') }}

                </div>

            @endif

            <form method="POST" action="{{ route('login.post') }}">

                @csrf

                <div class="mb-5">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="admin@alexandra.com"
                        class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                </div>

                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Contraseña
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        class="w-full border border-gray-300 rounded-xl p-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-semibold shadow-lg transition">

                    Ingresar al Sistema

                </button>

            </form>

            <div class="mt-8 text-center text-sm text-gray-500">

                © {{ date('Y') }} Creaciones Alexandra

            </div>

        </div>

    </div>

</div>

</body>
</html>