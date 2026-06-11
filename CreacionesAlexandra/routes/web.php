<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\ReporteController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.home');

/*
|--------------------------------------------------------------------------
| Productos
|--------------------------------------------------------------------------
*/

Route::resource('productos', ProductoController::class);

/*
|--------------------------------------------------------------------------
| Clientes
|--------------------------------------------------------------------------
*/

Route::resource('clientes', ClienteController::class);

/*
|--------------------------------------------------------------------------
| Ventas
|--------------------------------------------------------------------------
*/

Route::resource('ventas', VentaController::class);

/*
|--------------------------------------------------------------------------
| Inventario
|--------------------------------------------------------------------------
*/

Route::get('/inventario', [InventarioController::class, 'index'])
    ->name('inventario.index');

/*
|--------------------------------------------------------------------------
| Producción
|--------------------------------------------------------------------------
*/

Route::resource('produccion', ProduccionController::class);

Route::get(
    '/produccion/{id}/iniciar',
    [ProduccionController::class, 'iniciar']
)->name('produccion.iniciar');

Route::get(
    '/produccion/{id}/terminar',
    [ProduccionController::class, 'terminar']
)->name('produccion.terminar');

/*
|--------------------------------------------------------------------------
| Reportes
|--------------------------------------------------------------------------
*/

Route::get(
    '/reportes',
    [ReporteController::class, 'index']
)->name('reportes.index');

Route::get(
    '/reportes/pdf',
    [ReporteController::class, 'pdf']
)->name('reportes.pdf');