@extends('adminlte::page')

@section('title', __('Create') . ' Personaltienda')

@section('content_header')
    <h1>{{ __('Create') }} Personaltienda</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Personaltienda</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('personaltiendas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('personaltienda.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
