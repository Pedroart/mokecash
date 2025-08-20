@extends('adminlte::page')

@section('title', $seleccionesUsuario->name ?? __('Show') . ' Selecciones Usuario')

@section('content_header')
    <h1>{{ $seleccionesUsuario->name ?? __('Show') . ' Selecciones Usuario' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Selecciones Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('selecciones-usuarios.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Tienda Id:</strong>
                            {{ $seleccionesUsuario->tienda_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Vendedor Id:</strong>
                            {{ $seleccionesUsuario->vendedor_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dni Cliente:</strong>
                            {{ $seleccionesUsuario->dni_cliente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre Cliente:</strong>
                            {{ $seleccionesUsuario->nombre_cliente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Linea Credito:</strong>
                            {{ $seleccionesUsuario->linea_credito }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Producto Id:</strong>
                            {{ $seleccionesUsuario->producto_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio:</strong>
                            {{ $seleccionesUsuario->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
