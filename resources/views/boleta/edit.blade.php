@extends('adminlte::page')

@section('title', __('Update') . ' Boleta')

@section('content_header')
    <h1>{{ __('Update') }} Boleta</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Boleta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('boletas.update', $boleta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('boleta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
