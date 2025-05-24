@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row g-4">

        <div class="col-md-6 col-lg-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-3">🛍️</div>
                    <div>
                        <h6 class="mb-1">Ventas del día</h6>
                        <h5 class="fw-bold">S/ 1,350.00</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-3">👥</div>
                    <div>
                        <h6 class="mb-1">Clientes nuevos hoy</h6>
                        <h5 class="fw-bold">12</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card bg-dark text-white shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-3">📦</div>
                    <div>
                        <h6 class="mb-1">Más vendido</h6>
                        <h5 class="fw-bold">"Batería 12V" (27u)</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="card bg-dark text-white shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-3">💸</div>
                    <div>
                        <h6 class="mb-1">Créditos activos</h6>
                        <h5 class="fw-bold">38 créditos | S/ 24,500</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="card bg-dark text-white shadow">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 fs-3">🧾</div>
                    <div>
                        <h6 class="mb-1">Cuotas vencidas</h6>
                        <h5 class="fw-bold">5 cuotas | S/ 1,200</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
