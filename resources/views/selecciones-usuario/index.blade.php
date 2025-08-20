@extends('adminlte::page')

@section('title', 'Selecciones Usuario')

@section('content_header')
    <h1>Selecciones Usuario</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Selecciones Usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('selecciones-usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Tienda Id</th>
										<th>Vendedor Id</th>
										<th>Dni Cliente</th>
										<th>Nombre Cliente</th>
										<th>Linea Credito</th>
										<th>Producto Id</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seleccionesUsuarios as $seleccionesUsuario)
                                        <tr>
                                            <td>{{ $seleccionesUsuario->id }}</td>
                                            
											<td>{{ $seleccionesUsuario->tienda->nombre }}</td>
											<td>{{ $seleccionesUsuario->vendedor->name }}</td>
											<td>{{ $seleccionesUsuario->dni_cliente }}</td>
											<td>{{ $seleccionesUsuario->nombre_cliente }}</td>
											<td>{{ $seleccionesUsuario->linea_credito }}</td>
											<td>{{ $seleccionesUsuario->producto->nombre }}</td>
											<td>{{ $seleccionesUsuario->precio }}</td>

                                            <td>
                                                <form action="{{ route('selecciones-usuarios.destroy',$seleccionesUsuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('selecciones-usuarios.show',$seleccionesUsuario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('selecciones-usuarios.edit',$seleccionesUsuario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            pageLength: 10,
            language: {
                url: "https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json"
            },
        });
    });
    </script>
@endpush