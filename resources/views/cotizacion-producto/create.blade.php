@extends('adminlte::page')

@section('title', __('Create') . ' Cotizacion Producto')

@section('content_header')
    <h1>{{ __('Crear') }} Cotizacion Producto</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Cotizacion Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('cotizacion-productos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cotizacion-producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
