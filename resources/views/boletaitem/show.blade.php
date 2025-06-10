@extends('adminlte::page')

@section('title', $boletaitem->name ?? __('Show') . ' Boletaitem')

@section('content_header')
    <h1>{{ $boletaitem->name ?? __('Show') . ' Boletaitem' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Boletaitem</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('boletaitems.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Boleta Id:</strong>
                            {{ $boletaitem->boleta_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Sku:</strong>
                            {{ $boletaitem->sku }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion:</strong>
                            {{ $boletaitem->descripcion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Unidad De Medida:</strong>
                            {{ $boletaitem->unidad_de_medida }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cantidad:</strong>
                            {{ $boletaitem->cantidad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Valor Unitario:</strong>
                            {{ $boletaitem->valor_unitario }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Precio Unitario Con Igv:</strong>
                            {{ $boletaitem->precio_unitario_con_igv }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Codigo Tipo Afectacion Igv:</strong>
                            {{ $boletaitem->codigo_tipo_afectacion_igv }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Porcentaje Igv:</strong>
                            {{ $boletaitem->porcentaje_igv }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descuento Item:</strong>
                            {{ $boletaitem->descuento_item }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Total Item:</strong>
                            {{ $boletaitem->total_item }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
