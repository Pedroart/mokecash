@extends('layouts.app')

@section('content')
@php
    $productos = [
        (object)[
            'id' => 1,
            'nombre' => 'Laptop HP 14"',
            'precio' => 1899.99,
            'descripcion' => 'Intel Core i5, 8GB RAM, 256GB SSD'
        ],
        (object)[
            'id' => 2,
            'nombre' => 'Smartphone Xiaomi Redmi Note 12',
            'precio' => 849.90,
            'descripcion' => '6GB RAM, 128GB almacenamiento, AMOLED'
        ],
        (object)[
            'id' => 3,
            'nombre' => 'Impresora Epson EcoTank',
            'precio' => 699.00,
            'descripcion' => 'Multifuncional, Wi-Fi, tanque de tinta'
        ]
    ];
@endphp

<div class="container mt-4">
    <a href="{{ route('producto.create') }}" class="btn btn-success mb-3">Agregar Producto</a>

    <table class="table table-bordered bg-white shadow">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Precio (S/)</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>S/ {{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>
                    <a href="{{ route('producto.edit', ['id' => $producto->id]) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('producto.destroy', ['id' => $producto->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar producto?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
