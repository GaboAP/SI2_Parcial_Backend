<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EchoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\NotaVentaController;
use App\Http\Controllers\ProductoController;

Route::get('/echo', [EchoController::class, 'getEcho']);
Route::post('/echo', [EchoController::class, 'postEcho']);
//categoria routees
Route::get('/categoria',[CategoriaController::class, 'index'])->name('categoria.index');
Route::post('/categoria',[CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{categoria}',[CategoriaController::class, 'show'])->name('categoria.show');
Route::put('/categoria/{categoria}',[CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{categoria}',[CategoriaController::class, 'destroy'])->name('categoria.destroy');
Route::post('/categoria/buscar', [CategoriaController::class, 'search'])->name('categoria.search');
//login routes
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

//productos routes
Route::post('/productos/search', [ProductoController::class, 'search'])->name('productos.search');
Route::post('/productos/create', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{idProducto}',[ProductoController::class, 'getById'])->name('productos.getById');

//inventario routes
Route::get('/inventarios', [InventarioController::class, 'index'])->name('inventario.index');
Route::get('/inventarios/{idInventario}', [InventarioController::class, 'getById'])->name('inventario.getById');

//detalleCompra routes
Route::post('/detalleCompra/create', [DetalleCompraController::class, 'store'])->name('detalleCompra.store');
Route::post('/detalleCompra/get', [DetalleCompraController::class, 'getByCarritoId'])->name('detalleCompra.getByCarritoId');
Route::delete('/detalleCompra/{id}', [DetalleCompraController::class, 'destroy'])->name('detalleCompra.destroy');

//notaVenta  routes
Route::post('/notaVenta/create', [NotaVentaController::class, 'store'])->name('notaVenta.store');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
