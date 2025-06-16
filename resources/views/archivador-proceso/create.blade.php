@extends('adminlte::page')

@section('title', __('Crear') . ' Archivador Proceso')

@section('content_header')
    <h1>{{ __('Crear') }} Archivador Proceso</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Archivador Proceso</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('archivador-procesos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('archivador-proceso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
