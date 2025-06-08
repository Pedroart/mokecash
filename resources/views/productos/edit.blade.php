@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Editar Producto</h3>

            <form action="{{ route('producto.update') }}" method="POST">
                @csrf @method('PUT')
                @include('productos.form', ['producto' => $producto])
                <button type="submit" class="btn btn-warning w-100">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
