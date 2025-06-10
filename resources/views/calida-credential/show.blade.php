@extends('adminlte::page')

@section('title', $calidaCredential->name ?? __('Show') . ' Calida Credential')

@section('content_header')
    <h1>{{ $calidaCredential->name ?? __('Show') . ' Calida Credential' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Calida Credential</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('calida-credentials.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Usuario:</strong>
                            {{ $calidaCredential->usuario }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tokencontra:</strong>
                            {{ $calidaCredential->tokencontra }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
