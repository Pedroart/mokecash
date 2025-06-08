@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Agregar Producto</h3>

            <form action="{{ route('producto.store') }}" method="POST">
                @csrf
                @include('productos.form')
                <button type="submit" class="btn btn-warning w-100">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
