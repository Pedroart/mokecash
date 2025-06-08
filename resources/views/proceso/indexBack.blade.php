@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Panel de BackOffice - Registro de Procesos</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Fecha de Creación</th>
                <th>Hora</th>
                <th>Tienda</th>
                <th>Vendedor</th>
                <th>DNI Cliente</th>
                <th>Estado</th>
                <th>Etapa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2025-06-07</td>
                <td>10:24 AM</td>
                <td>Tienda Lima Norte</td>
                <td>Juan Pérez</td>
                <td>12345678</td>
                <td><span class="badge bg-success">Activo</span></td>
                <td>2. Validación Biométrica</td>
                <td>
                    <a href="{{ route('procesoBack.view', ['id' => 1]) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>2025-06-06</td>
                <td>02:51 PM</td>
                <td>Tienda Miraflores</td>
                <td>María García</td>
                <td>87654321</td>
                <td><span class="badge bg-secondary">Cerrado</span></td>
                <td>4. Subida a MOKE</td>
                <td>
                    <a href="{{ route('procesoBack.view', ['id' => 2]) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>2025-06-05</td>
                <td>08:09 AM</td>
                <td>Tienda Callao</td>
                <td>Lucas Gómez</td>
                <td>45678912</td>
                <td><span class="badge bg-danger">Anulado</span></td>
                <td>1. Ingreso de Datos</td>
                <td>
                    <a href="{{ route('procesoBack.view', ['id' => 3]) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
