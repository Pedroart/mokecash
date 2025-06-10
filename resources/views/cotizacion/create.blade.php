@extends('adminlte::page')

@section('title', __('Create') . ' Cotizacion')

@section('content_header')
    <h1>{{ __('Create') }} Cotizacion</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Cotizacion</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('cotizacions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cotizacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
