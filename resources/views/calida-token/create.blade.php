@extends('adminlte::page')

@section('title', __('Create') . ' Calida Token')

@section('content_header')
    <h1>{{ __('Create') }} Calida Token</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Calida Token</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('calida-tokens.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('calida-token.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
