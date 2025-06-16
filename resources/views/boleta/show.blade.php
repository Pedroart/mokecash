@extends('adminlte::page')

@section('title', 'Boleta ' . $boleta->numero_boleta_completo)

@section('content')
<section class="invoice p-3 mb-3">
    <!-- Title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-receipt"></i> {{ $boleta->empresa_nombre }}
                <small class="float-right">Fecha: {{ $boleta->fecha_emision->format('d/m/Y') }}</small>
            </h4>
        </div>
    </div>

    <!-- Info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong>Empresa</strong>
            <address>
                {{ $boleta->empresa_nombre }}<br>
                {{ $boleta->empresa_direccion }}<br>
                RUC: {{ $boleta->empresa_ruc }}
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <strong>Cliente</strong>
            <address>
                {{ $boleta->cliente_denominacion }}<br>
                {{ $boleta->cliente_direccion }}<br>
                Documento: {{ $boleta->cliente_tipo_documento }} - {{ $boleta->cliente_numero_documento }}
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Boleta N°:</b> {{ $boleta->numero_boleta_completo }}<br>
            <b>Moneda:</b> {{ $boleta->moneda }}<br>
            <b>Cajero:</b> {{ $boleta->cajero }}
        </div>
    </div>

    <!-- Items table -->
    <div class="row mt-3">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Producto</th>
                        <th>IMEI</th>
                        <th>Unidad</th>
                        <th>V. Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boleta->items as $item)
                    <tr>
                        <td>{{ $item->cantidad }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->unidad_de_medida }}</td>
                        <td>S/ {{ number_format($item->valor_unitario, 2) }}</td>
                        <td>S/ {{ number_format($item->total_item, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Totales y pago -->
    <div class="row mt-4">
        <div class="col-6">
            <p class="lead">Método de Pago:</p>
            <p>{{ $boleta->metodo_pago }}</p>
            <p class="text-muted">SON: {{ strtoupper($boleta->importe_letras) }}</p>
            <br><br>
            <p><strong>Firma y Huella:</strong></p>
            <div style="width: 100%; height: 80px; border: 1px dashed #333;"></div>

        </div>

        <div class="col-6">
            <p class="lead">Resumen</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Gravada:</th>
                        <td>S/ {{ number_format($boleta->total_gravada, 2) }}</td>
                    </tr>
                    <tr>
                        <th>IGV (18%):</th>
                        <td>S/ {{ number_format($boleta->total_igv, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td><strong>S/ {{ number_format($boleta->importe_total, 2) }}</strong></td>
                    </tr>
                    @if($boleta->monto_pagado)
                    <tr>
                        <th>Pagado:</th>
                        <td>S/ {{ number_format($boleta->monto_pagado, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Cambio:</th>
                        <td>S/ {{ number_format($boleta->cambio, 2) }}</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <!-- Acciones -->
    <div class="row no-print mt-3">
        <div class="col-12">
            <a href="javascript:window.print()" class="btn btn-default">
                <i class="fas fa-print"></i> Imprimir
            </a>
        </div>
    </div>
</section>
@endsection


