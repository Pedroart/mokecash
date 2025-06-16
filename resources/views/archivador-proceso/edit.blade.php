@extends('adminlte::page')

@section('title', __('Actualizar') . ' Archivador Proceso')

@section('content_header')
    <h1>{{ __('Actualizar') }} Archivador Proceso</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Archivador Proceso</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('archivador-procesos.update', $archivadorProceso->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('archivador-proceso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
