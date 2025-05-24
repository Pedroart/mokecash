<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\FinanciamientoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware(['auth'])->group(function () {
    // Aquí puedes añadir más rutas protegidas
    Route::get('/generar-tokens', [TokenController::class, 'generarTokens']);
    Route::get('/linea-credito', [FinanciamientoController::class, 'consultarLineaCredito']);
//});