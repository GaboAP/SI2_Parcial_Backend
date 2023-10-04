<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EchoController;
use App\Http\Controllers\AuthController;

Route::get('/echo', [EchoController::class, 'getEcho']);
Route::post('/echo', [EchoController::class, 'postEcho']);

Route::get('/categoria',[CategoriaController::class, 'index'])->name('categoria.index');
Route::post('/categoria',[CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{categoria}',[CategoriaController::class, 'show'])->name('categoria.show');
Route::put('/categoria/{categoria}',[CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{categoria}',[CategoriaController::class, 'destroy'])->name('categoria.destroy');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
//make logout route that signals de logout() method on authController
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
