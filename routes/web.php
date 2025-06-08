<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');

    Route::get('/simulador', fn () => view('simulador.simulador'))->name('simulador');

    // Solo para admin
    Route::get('/admin', fn () => view('admin'))->middleware('role:admin')->name('admin.dashboard');

    Route::get('/proceso', fn () => view('proceso.index'))->name('proceso.index');
    Route::get('/proceso/view', fn () => view('proceso.view'))->name('proceso.view');
    Route::get('/procesoBack', fn () => view('proceso.indexBack'))->name('proceso.indexBack');
    Route::get('/procesoBack/view', fn () => view('proceso.viewBack'))->name('procesoBack.view');
    
    // Vista de listado de productos
    Route::get('/producto', fn () => view('productos.index'))->name('producto.view');

    // Vista de crear producto
    Route::get('/producto/crear', fn () => view('productos.create'))->name('producto.create');

    // Vista de editar producto (con variable de ejemplo)
    Route::get('/producto/editar', function () {
        $producto = (object)[
            'nombre' => 'Laptop Gamer',
            'precio' => 3999.90,
            'descripcion' => 'Intel Core i7, 16GB RAM, 512GB SSD, RTX 3060'
        ];
        return view('productos.edit', compact('producto'));
    })->name('producto.edit');

        // Vista de listado de productos
    Route::get('/producto/destroy', fn () => view('productos.index'))->name('producto.destroy');
    Route::get('/producto/update', fn () => view('productos.index'))->name('producto.update');
    Route::get('/producto/store', fn () => view('productos.index'))->name('producto.store');

    // Vista de listado de productos
    Route::get('/simulador2', fn () => view('simulador.simuladorSelector'))->name('simulador.selector');
    

});

Auth::routes();

