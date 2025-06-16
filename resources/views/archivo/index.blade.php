@extends('adminlte::page')

@section('title', 'Archivo')

@section('content_header')
    <h1>Archivo</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Archivo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('archivos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre</th>
										<th>File Name</th>
										<th>Mime Type</th>
										<th>Path</th>
										<th>Size</th>
										<th>Disk</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archivos as $archivo)
                                        <tr>
                                            <td>{{ $archivo->id }}</td>
                                            
											<td>{{ $archivo->nombre }}</td>
											<td>{{ $archivo->file_name }}</td>
											<td>{{ $archivo->mime_type }}</td>
											<td>{{ $archivo->path }}</td>
											<td>{{ $archivo->size }}</td>
											<td>{{ $archivo->disk }}</td>

                                            <td>
                                                <form action="{{ route('archivos.destroy',$archivo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('archivos.show',$archivo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('archivos.edit',$archivo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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