@extends('adminlte::page')

@section('title', __('Update') . ' Personaltienda')

@section('content_header')
    <h1>{{ __('Update') }} Personaltienda</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Personaltienda</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('personaltiendas.update', $personaltienda->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('personaltienda.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
