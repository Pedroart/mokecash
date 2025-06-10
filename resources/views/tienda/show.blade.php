@extends('adminlte::page')

@section('title', $tienda->name ?? __('Show') . ' Tienda')

@section('content_header')
    <h1>{{ $tienda->name ?? __('Show') . ' Tienda' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tienda</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tiendas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $tienda->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Direccion:</strong>
                            {{ $tienda->direccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Telefono:</strong>
                            {{ $tienda->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
