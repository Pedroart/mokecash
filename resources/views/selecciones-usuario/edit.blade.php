@extends('adminlte::page')

@section('title', __('Actualizar') . ' Selecciones Usuario')

@section('content_header')
    <h1>{{ __('Actualizar') }} Selecciones Usuario</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Selecciones Usuario</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('selecciones-usuarios.update', $seleccionesUsuario->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('selecciones-usuario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
