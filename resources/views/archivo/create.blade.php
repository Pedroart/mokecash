@extends('adminlte::page')

@section('title', __('Create') . ' Archivo')

@section('content_header')
    <h1>{{ __('Crear') }} Archivo</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Archivo</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('archivos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('archivo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
