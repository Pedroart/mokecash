@extends('adminlte::page')

@section('title', __('Actualizar') . ' Etapas Proceso')

@section('content_header')
    <h1>{{ __('Actualizar') }} Etapas Proceso</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Etapas Proceso</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('etapas-procesos.update', $etapasProceso->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('etapas-proceso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
