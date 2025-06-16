@extends('adminlte::page')

@section('title', 'Etapas Proceso')

@section('content_header')
    <h1>Etapas Proceso</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Etapas Proceso') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('etapas-procesos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Cotizacion Id</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etapasProcesos as $etapasProceso)
                                        <tr>
                                            <td>{{ $etapasProceso->id }}</td>
                                            
											<td>{{ $etapasProceso->cotizacion_id }}</td>
											<td>{{ $etapasProceso->estado }}</td>

                                            <td>
                                                <form action="{{ route('etapas-procesos.destroy',$etapasProceso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('etapas-procesos.show',$etapasProceso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('etapas-procesos.edit',$etapasProceso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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