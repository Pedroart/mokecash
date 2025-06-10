<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\PersonaltiendaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CalidaCredentialController;
use App\Http\Controllers\CalidaTokenController;
use App\Http\Controllers\BoletaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::resource('tiendas', TiendaController::class);
    Route::resource('personaltiendas', PersonaltiendaController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('cotizacions', CotizacionController::class);
    Route::get('/cotizacion/{id}/avanzar-etapa', [CotizacionController::class, 'avanzar']);

    Route::resource('calida-credentials', CalidaCredentialController::class);
    Route::resource('calida-tokens', CalidaTokenController::class);
    Route::resource('boletas', BoletaController::class);


    Route::get('/consulta-financiamiento', function () {
        return view('consulta-financiamiento.index');
    });
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');          // caché de la app
    Artisan::call('config:clear');         // caché de configuración
    Artisan::call('route:clear');          // caché de rutas
    Artisan::call('view:clear');           // caché de vistas
    Artisan::call('optimize:clear');       // limpio completo
    return 'Todas las caches han sido limpiadas';
});

Route::fallback(function () {
    return redirect('/home');
});

