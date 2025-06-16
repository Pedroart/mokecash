@extends('adminlte::page')

@section('title', $archivo->name ?? __('Show') . ' Archivo')

@section('content_header')
    <h1>{{ $archivo->name ?? __('Show') . ' Archivo' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Archivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('archivos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $archivo->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>File Name:</strong>
                            {{ $archivo->file_name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Mime Type:</strong>
                            {{ $archivo->mime_type }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Path:</strong>
                            {{ $archivo->path }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Size:</strong>
                            {{ $archivo->size }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Disk:</strong>
                            {{ $archivo->disk }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
