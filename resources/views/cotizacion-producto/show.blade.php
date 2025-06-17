@extends('adminlte::page')

@section('title', $cotizacionProducto->name ?? __('Show') . ' Cotizacion Producto')

@section('content_header')
    <h1>{{ $cotizacionProducto->name ?? __('Show') . ' Cotizacion Producto' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Cotizacion Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cotizacion-productos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Cotizacion Id:</strong>
                            {{ $cotizacionProducto->cotizacion_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Producto Id:</strong>
                            {{ $cotizacionProducto->producto_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Imei:</strong>
                            {{ $cotizacionProducto->imei }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
