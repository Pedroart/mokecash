@extends('adminlte::page')

@section('title', 'Calida Credential')

@section('content_header')
    <h1>Calida Credential</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Calida Credential') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('calida-credentials.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Usuario</th>
										<th>Tokencontra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calidaCredentials as $calidaCredential)
                                        <tr>
                                            <td>{{ $calidaCredential->id }}</td>
                                            
											<td>{{ $calidaCredential->usuario }}</td>
											<td>{{ $calidaCredential->tokencontra }}</td>

                                            <td>
                                                <form action="{{ route('calida-credentials.destroy',$calidaCredential->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('calida-credentials.show',$calidaCredential->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('calida-credentials.edit',$calidaCredential->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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