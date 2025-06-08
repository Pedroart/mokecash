@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Resumen de Procesos de Financiamiento</h3>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Vendedor</th>
                <th>Etapa</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Tienda</th>
                <th>DNI Cliente</th>
                <th>Monto (S/)</th>
                <th>Vendedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>jlopez</td>
                <td>2. Validación Biométrica</td>
                <td><span class="badge bg-success">Activo</span></td>
                <td>2025-06-07</td>
                <td>Tienda Lima Norte</td>
                <td>12345678</td>
                <td>849.90</td>
                <td>Juan Pérez</td>
                <td>
                    <a href="{{ route('proceso.view', ['id' => 1]) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>mramirez</td>
                <td>4. Subida a MOKE</td>
                <td><span class="badge bg-secondary">Cerrado</span></td>
                <td>2025-06-06</td>
                <td>Tienda Miraflores</td>
                <td>87654321</td>
                <td>1299.99</td>
                <td>María García</td>
                <td>
                    <a href="{{ route('proceso.view', ['id' => 2]) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>lvaldez</td>
                <td>1. Ingreso de Datos</td>
                <td><span class="badge bg-danger">Anulado</span></td>
                <td>2025-06-05</td>
                <td>Tienda Callao</td>
                <td>45678912</td>
                <td>699.00</td>
                <td>Lucas Gómez</td>
                <td>
                    <a href="{{ route('proceso.view', ['id' => 3]) }}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
