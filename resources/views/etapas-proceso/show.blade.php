@extends('adminlte::page')

@section('title', $etapasProceso->name ?? __('Show') . ' Etapas Proceso')

@section('content_header')
    <h1>{{ $etapasProceso->name ?? __('Show') . ' Etapas Proceso' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Etapas Proceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('etapas-procesos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Cotizacion Id:</strong>
                            {{ $etapasProceso->cotizacion_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Estado:</strong>
                            {{ $etapasProceso->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
