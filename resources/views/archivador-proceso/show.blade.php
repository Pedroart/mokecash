@extends('adminlte::page')

@section('title', $archivadorProceso->name ?? __('Show') . ' Archivador Proceso')

@section('content_header')
    <h1>{{ $archivadorProceso->name ?? __('Show') . ' Archivador Proceso' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Archivador Proceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('archivador-procesos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Cotizacion Id:</strong>
                            {{ $archivadorProceso->cotizacion_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Clave:</strong>
                            {{ $archivadorProceso->clave }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Valor:</strong>
                            {{ $archivadorProceso->valor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
