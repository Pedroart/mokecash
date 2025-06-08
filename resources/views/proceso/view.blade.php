@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <ul class="nav nav-tabs" id="procesoTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="etapa1-tab" data-bs-toggle="tab" data-bs-target="#etapa1" type="button" role="tab">1. Ingreso de Datos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="etapa2-tab" data-bs-toggle="tab" data-bs-target="#etapa2" type="button" role="tab">2. Validación Biométrica</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="etapa3-tab" data-bs-toggle="tab" data-bs-target="#etapa3" type="button" role="tab">3. Evidencias</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="etapa4-tab" data-bs-toggle="tab" data-bs-target="#etapa4" type="button" role="tab">4. Subida a MOKE</button>
        </li>
    </ul>

    <div class="tab-content p-3 border border-top-0 shadow" id="procesoTabsContent">
        <div class="tab-pane fade show active" id="etapa1" role="tabpanel">
            <h4 class="text-center mb-4">Proceso de Financiamiento - Etapa 1: Ingreso de Datos</h4>
            <form>
                <div class="mb-3">
                    <label class="form-label">DNI del Cliente</label>
                    <input type="text" class="form-control" value="12345678" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dirección Disponible</label>
                    <select class="form-select">
                        <option>Av. Las Flores 123</option>
                        <option>Av. Los Laureles 456</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" placeholder="cliente@correo.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Número de cuotas</label>
                    <select class="form-select">
                        <option>3</option>
                        <option>6</option>
                        <option>12</option>
                        <option>18</option>
                        <option>24</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Teléfono de contacto</label>
                    <input type="tel" class="form-control" placeholder="999999999">
                </div>
                <div class="mb-3">
                    <label class="form-label">Producto Seleccionado</label>
                    <div class="border p-3 bg-light">
                        <strong>Samsung A14</strong><br>
                        Precio: S/ 849.90<br>
                        Cuotas: 6 cuotas de S/ 162.34 aprox.
                    </div>
                </div>
                <div class="alert alert-warning">
                    ¿Está seguro de continuar con el proceso?
                </div>
                <button class="btn btn-primary">Continuar a Validación Biométrica</button>
            </form>
        </div>

        <div class="tab-pane fade" id="etapa2" role="tabpanel">
            <h4 class="text-center">Etapa 2: Validación Biométrica</h4>
            <p class="text-success text-center">Enlace de validación biométrica enviado al cliente a <strong>cliente@correo.com</strong> y <strong>999999999</strong></p>
            <p class="text-muted text-center">Esperando registro biométrico. Confirmar con BackOffice cuando el cliente haya completado el procedimiento.</p>

            <div class="text-center mt-4">
                <button class="btn btn-outline-primary" onclick="window.print()">🖨️ Imprimir Boleta</button>
            </div>
        </div>

        <div class="tab-pane fade" id="etapa3" role="tabpanel">
            <h4 class="text-center">Etapa 3: Ingreso de Evidencias</h4>
            <ul>
                <li>Boleta firmada (PDF)</li>
                <li>DNI cara superior (imagen)</li>
                <li>DNI cara inferior (imagen)</li>
                <li>Foto de sustento de entrega (imagen)</li>
            </ul>
            <button class="btn btn-outline-secondary">Subir Evidencias</button>
        </div>

        <div class="tab-pane fade" id="etapa4" role="tabpanel">
            <h4 class="text-center">Etapa 4: Subida de Boleta a MOKE</h4>
            <p>Sube la boleta de venta final al sistema MOKE.</p>
            <input type="file" class="form-control mb-3">
            <button class="btn btn-success">Subir Boleta</button>
        </div>
    </div>
</div>
@endsection
