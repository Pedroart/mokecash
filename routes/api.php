<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalidaLineaCreditoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ArchivadorProcesoController;
use App\Http\Controllers\BoletaController;
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
Route::post('/archivador-procesos', [ArchivadorProcesoController::class, 'store2']);
Route::post('/boletas', [BoletaController::class, 'generar']);
Route::post('/evidencias', [CotizacionController::class, 'storeArchivo']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
