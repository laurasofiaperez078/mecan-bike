<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetalleServicioController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\MovimientoInventarioController;
use App\Http\Controllers\OrdenServicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RepuestoUsadoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;


Route::apiResource('bicicletas', BicicletaController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('movimientos-inventario', MovimientoInventarioController::class);
Route::apiResource('ordenes-servicio', OrdenServicioController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('repuestos-usados', RepuestoUsadoController::class);
Route::apiResource('servicios', ServicioController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('ventas', VentaController::class);


Route::apiResource('detalles-servicio', DetalleServicioController::class)->except(['store']);
Route::apiResource('detalles-venta', DetalleVentaController::class)->except(['store']);