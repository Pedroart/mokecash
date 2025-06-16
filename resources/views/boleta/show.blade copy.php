@extends('adminlte::page')

@section('title', $boleta->name ?? __('Show') . ' Boleta')

@section('content_header')
    <h1>{{ $boleta->name ?? __('Show') . ' Boleta' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Boleta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('boletas.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Serie:</strong>
                            {{ $boleta->serie }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Numero:</strong>
                            {{ $boleta->numero }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Numero Boleta Completo:</strong>
                            {{ $boleta->numero_boleta_completo }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Emision:</strong>
                            {{ $boleta->fecha_emision }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Vencimiento:</strong>
                            {{ $boleta->fecha_vencimiento }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Moneda:</strong>
                            {{ $boleta->moneda }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo Operacion:</strong>
                            {{ $boleta->tipo_operacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cajero:</strong>
                            {{ $boleta->cajero }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Empresa Nombre:</strong>
                            {{ $boleta->empresa_nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Empresa Ruc:</strong>
                            {{ $boleta->empresa_ruc }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Empresa Direccion:</strong>
                            {{ $boleta->empresa_direccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cliente Tipo Documento:</strong>
                            {{ $boleta->cliente_tipo_documento }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cliente Numero Documento:</strong>
                            {{ $boleta->cliente_numero_documento }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cliente Denominacion:</strong>
                            {{ $boleta->cliente_denominacion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cliente Direccion:</strong>
                            {{ $boleta->cliente_direccion }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Total Gravada:</strong>
                            {{ $boleta->total_gravada }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Total Igv:</strong>
                            {{ $boleta->total_igv }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Importe Total:</strong>
                            {{ $boleta->importe_total }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Importe Letras:</strong>
                            {{ $boleta->importe_letras }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Metodo Pago:</strong>
                            {{ $boleta->metodo_pago }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Monto Pagado:</strong>
                            {{ $boleta->monto_pagado }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cambio:</strong>
                            {{ $boleta->cambio }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Api Hash:</strong>
                            {{ $boleta->api_hash }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Xml Url:</strong>
                            {{ $boleta->xml_url }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Cdr Url:</strong>
                            {{ $boleta->cdr_url }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Qr Code Path:</strong>
                            {{ $boleta->qr_code_path }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Sunat Resolucion:</strong>
                            {{ $boleta->sunat_resolucion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
