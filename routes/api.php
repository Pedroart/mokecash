<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalidaLineaCreditoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CotizacionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/calidda/linea-credito', [CalidaLineaCreditoController::class, 'consultarLineaCredito']);
Route::get('/tiendas/{tiendaId}/productos', [ProductoController::class, 'productosPorTienda']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
