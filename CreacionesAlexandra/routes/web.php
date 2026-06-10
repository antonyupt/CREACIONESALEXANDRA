<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProduccionController;


Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('productos', ProductoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('ventas', VentaController::class);
Route::get('/inventario', [InventarioController::class, 'index']);
Route::get('/', [DashboardController::class, 'index']);
Route::resource(
    'produccion',
    ProduccionController::class
);
Route::get(
    '/produccion/{id}/terminar',
    [ProduccionController::class, 'terminar']
)->name('produccion.terminar');