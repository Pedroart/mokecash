@extends('adminlte::page')

@section('title', $cotizacion->name ?? __('Show') . ' Cotizacion')

@section('content_header')
    <h1>{{ $cotizacion->name ?? __('Show') . ' Cotizacion' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Cotizacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cotizacions.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Tienda Id:</strong>
                            {{ $cotizacion->tienda_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Vendedor Id:</strong>
                            {{ $cotizacion->vendedor_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dni Cliente:</strong>
                            {{ $cotizacion->dni_cliente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre Cliente:</strong>
                            {{ $cotizacion->nombre_cliente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Direccion:</strong>
                            {{ $cotizacion->direccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cuotas:</strong>
                            {{ $cotizacion->cuotas }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Monto:</strong>
                            {{ $cotizacion->monto }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Monto Financiado:</strong>
                            {{ $cotizacion->monto_financiado }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Estatus:</strong>
                            {{ $cotizacion->estatus }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Ip Origen:</strong>
                            {{ $cotizacion->ip_origen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
