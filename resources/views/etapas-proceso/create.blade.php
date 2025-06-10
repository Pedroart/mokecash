@extends('adminlte::page')

@section('title', __('Create') . ' Etapas Proceso')

@section('content_header')
    <h1>{{ __('Create') }} Etapas Proceso</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Etapas Proceso</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('etapas-procesos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('etapas-proceso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
