@extends('adminlte::page')

@section('title', 'Boleta')

@section('content_header')
    <h1>Boleta</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Boleta') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('boletas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Serie</th>
										<th>Numero</th>
										<th>Numero Boleta Completo</th>
										<th>Fecha Emision</th>
										<th>Fecha Vencimiento</th>
										<th>Moneda</th>
										<th>Tipo Operacion</th>
										<th>Cajero</th>
										<th>Empresa Nombre</th>
										<th>Empresa Ruc</th>
										<th>Empresa Direccion</th>
										<th>Cliente Tipo Documento</th>
										<th>Cliente Numero Documento</th>
										<th>Cliente Denominacion</th>
										<th>Cliente Direccion</th>
										<th>Total Gravada</th>
										<th>Total Igv</th>
										<th>Importe Total</th>
										<th>Importe Letras</th>
										<th>Metodo Pago</th>
										<th>Monto Pagado</th>
										<th>Cambio</th>
										<th>Api Hash</th>
										<th>Xml Url</th>
										<th>Cdr Url</th>
										<th>Qr Code Path</th>
										<th>Sunat Resolucion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boletas as $boleta)
                                        <tr>
                                            <td>{{ $boleta->id }}</td>
                                            
											<td>{{ $boleta->serie }}</td>
											<td>{{ $boleta->numero }}</td>
											<td>{{ $boleta->numero_boleta_completo }}</td>
											<td>{{ $boleta->fecha_emision }}</td>
											<td>{{ $boleta->fecha_vencimiento }}</td>
											<td>{{ $boleta->moneda }}</td>
											<td>{{ $boleta->tipo_operacion }}</td>
											<td>{{ $boleta->cajero }}</td>
											<td>{{ $boleta->empresa_nombre }}</td>
											<td>{{ $boleta->empresa_ruc }}</td>
											<td>{{ $boleta->empresa_direccion }}</td>
											<td>{{ $boleta->cliente_tipo_documento }}</td>
											<td>{{ $boleta->cliente_numero_documento }}</td>
											<td>{{ $boleta->cliente_denominacion }}</td>
											<td>{{ $boleta->cliente_direccion }}</td>
											<td>{{ $boleta->total_gravada }}</td>
											<td>{{ $boleta->total_igv }}</td>
											<td>{{ $boleta->importe_total }}</td>
											<td>{{ $boleta->importe_letras }}</td>
											<td>{{ $boleta->metodo_pago }}</td>
											<td>{{ $boleta->monto_pagado }}</td>
											<td>{{ $boleta->cambio }}</td>
											<td>{{ $boleta->api_hash }}</td>
											<td>{{ $boleta->xml_url }}</td>
											<td>{{ $boleta->cdr_url }}</td>
											<td>{{ $boleta->qr_code_path }}</td>
											<td>{{ $boleta->sunat_resolucion }}</td>

                                            <td>
                                                <form action="{{ route('boletas.destroy',$boleta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('boletas.show',$boleta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('boletas.edit',$boleta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            responsive: true,
            autoWidth: false,
            order: [[0, 'asc']],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            pageLength: 10
        });
    });
    </script>
@endpush