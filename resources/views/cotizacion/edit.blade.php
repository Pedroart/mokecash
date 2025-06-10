@extends('adminlte::page')

@section('title', __('Update') . ' Cotizacion')

@section('content_header')
    <h1>{{ __('Update') }} Cotizacion</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Cotizacion</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('cotizacions.update', $cotizacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cotizacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
