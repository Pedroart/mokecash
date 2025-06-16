@extends('adminlte::page')

@section('title', 'Boletaitem')

@section('content_header')
    <h1>Boletaitem</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Boletaitem') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('boletaitems.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Boleta Id</th>
										<th>Sku</th>
										<th>Descripcion</th>
										<th>Unidad De Medida</th>
										<th>Cantidad</th>
										<th>Valor Unitario</th>
										<th>Precio Unitario Con Igv</th>
										<th>Codigo Tipo Afectacion Igv</th>
										<th>Porcentaje Igv</th>
										<th>Descuento Item</th>
										<th>Total Item</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boletaitems as $boletaitem)
                                        <tr>
                                            <td>{{ $boletaitem->id }}</td>
                                            
											<td>{{ $boletaitem->boleta_id }}</td>
											<td>{{ $boletaitem->sku }}</td>
											<td>{{ $boletaitem->descripcion }}</td>
											<td>{{ $boletaitem->unidad_de_medida }}</td>
											<td>{{ $boletaitem->cantidad }}</td>
											<td>{{ $boletaitem->valor_unitario }}</td>
											<td>{{ $boletaitem->precio_unitario_con_igv }}</td>
											<td>{{ $boletaitem->codigo_tipo_afectacion_igv }}</td>
											<td>{{ $boletaitem->porcentaje_igv }}</td>
											<td>{{ $boletaitem->descuento_item }}</td>
											<td>{{ $boletaitem->total_item }}</td>

                                            <td>
                                                <form action="{{ route('boletaitems.destroy',$boletaitem->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('boletaitems.show',$boletaitem->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('boletaitems.edit',$boletaitem->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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