<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('productos', ProductoController::class);
Route::resource('clientes', ClienteController::class);
Route::post('/buscar-documento', [ClienteController::class, 'buscarDocumento']);