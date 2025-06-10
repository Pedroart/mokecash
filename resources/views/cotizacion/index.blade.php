@extends('adminlte::page')

@section('title', 'Cotizacion')

@section('content_header')
    <h1>Cotizacion</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cotizacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cotizacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Tienda Id</th>
										<th>Vendedor Id</th>
										<th>Producto Id</th>
										<th>Cuotas</th>
										<th>Monto</th>
										<th>Dni Cliente</th>
										<th>Ip Origen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cotizacions as $cotizacion)
                                        <tr>
                                            <td>{{ $cotizacion->id }}</td>
                                            
											<td>{{ $cotizacion->tienda_id }}</td>
											<td>{{ $cotizacion->vendedor_id }}</td>
											<td>{{ $cotizacion->producto_id }}</td>
											<td>{{ $cotizacion->cuotas }}</td>
											<td>{{ $cotizacion->monto }}</td>
											<td>{{ $cotizacion->dni_cliente }}</td>
											<td>{{ $cotizacion->ip_origen }}</td>

                                            <td>
                                                <form action="{{ route('cotizacions.destroy',$cotizacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cotizacions.show',$cotizacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cotizacions.edit',$cotizacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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