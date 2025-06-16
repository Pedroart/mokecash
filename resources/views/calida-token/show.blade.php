@extends('adminlte::page')

@section('title', $calidaToken->name ?? __('Show') . ' Calida Token')

@section('content_header')
    <h1>{{ $calidaToken->name ?? __('Show') . ' Calida Token' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Calida Token</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('calida-tokens.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Calida Credential Id:</strong>
                            {{ $calidaToken->calida_credential_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Auth Token:</strong>
                            {{ $calidaToken->auth_token }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Aliado Id:</strong>
                            {{ $calidaToken->aliado_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Expires At:</strong>
                            {{ $calidaToken->expires_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
