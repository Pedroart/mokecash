@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card mb-4 shadow-sm border-info">
        <div class="card-body">
            <h4 class="card-title">Resumen del Proceso</h4>
            <p class="mb-1"><strong>Cliente:</strong> Juan Pérez</p>
            <p class="mb-1"><strong>DNI:</strong> 12345678</p>
            <p class="mb-1"><strong>Producto:</strong> Samsung A14</p>
            <p class="mb-1"><strong>Precio Crediticio:</strong> S/ 849.90</p>
            <p class="mb-1"><strong>Cuotas:</strong> 6</p>
            <p class="mb-1"><strong>Teléfono:</strong> 999999999</p>
            <p><strong>Correo:</strong> cliente@correo.com</p>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <label for="estadoProceso" class="form-label me-2">Estado del Proceso:</label>
            <select class="form-select d-inline w-auto" id="estadoProceso">
                <option>Activo</option>
                <option>Cerrado</option>
                <option>Anulado</option>
            </select>
        </div>
    </div>

    <ul class="nav nav-tabs mb-4" id="procesoTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#etapa1" type="button" role="tab">1. Ingreso de Datos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#etapa2" type="button" role="tab">2. Validación Biométrica</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#etapa3" type="button" role="tab">3. Ingreso de Evidencias</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#etapa4" type="button" role="tab">4. Subida a MOKE</button>
        </li>
    </ul>

    <div class="tab-content" id="procesoTabsContent">
        <!-- Etapa 1 -->
        <div class="tab-pane fade show active" id="etapa1" role="tabpanel">
            <h5>1. Ingreso de Datos</h5>
            <p class="text-info">Copie estos datos en la plataforma de <strong>Credicalida</strong> y confirme la generación de boleta:</p>
            <ul class="mb-3">
                <li><strong>DNI:</strong> 12345678</li>
                <li><strong>Dirección:</strong> Av. Las Flores 123</li>
                <li><strong>Correo:</strong> cliente@correo.com</li>
                <li><strong>Cuotas:</strong> 6</li>
                <li><strong>Teléfono:</strong> 999999999</li>
                <li><strong>Producto:</strong> Samsung A14</li>
            </ul>
            <div class="mb-3">
                <label class="form-label">Precio Crediticio</label>
                <div class="border p-3 bg-light">
                    <strong>S/ 849.90</strong>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmar Generación de Boleta</label>
                <div>
                    <button class="btn btn-outline-success">Generar Boleta Automáticamente</button>
                </div>
                <div class="mt-3">
                    <p class="fw-bold">Vista previa de Boleta:</p>
                    <img src="/img/dummy/boleta_generada.jpg" class="img-fluid rounded border mb-2">
                    <br>
                    <a href="#" class="btn btn-outline-dark">Imprimir Boleta</a>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-primary" type="button" onclick="mostrarTab('etapa2')">Continuar</button>
            </div>
        </div>

        <!-- Etapa 2 -->
        <div class="tab-pane fade" id="etapa2" role="tabpanel">
            <h5>2. Validación Biométrica</h5>
            <p class="text-info">Verifique el estado de la validación biométrica.</p>
            <p><strong>Estado actual:</strong> Enlace enviado a cliente@correo.com y 999999999</p>
            <div class="text-end">
                <button class="btn btn-primary" type="button" onclick="mostrarTab('etapa3')">Continuar</button>
            </div>
        </div>

        <!-- Etapa 3 -->
        <div class="tab-pane fade" id="etapa3" role="tabpanel">
            <h5>3. Ingreso de Evidencias</h5>
            <p class="text-info">Verifique que todas las evidencias estén completas:</p>
            <div class="row">
                <div class="col-md-3">
                    <p class="fw-bold">Boleta firmada</p>
                    <img src="/img/dummy/boleta.png" class="img-fluid rounded border">
                </div>
                <div class="col-md-3">
                    <p class="fw-bold">DNI cara superior</p>
                    <img src="/img/dummy/dni_front.png" class="img-fluid rounded border">
                </div>
                <div class="col-md-3">
                    <p class="fw-bold">DNI cara inferior</p>
                    <img src="/img/dummy/dni_back.png" class="img-fluid rounded border">
                </div>
                <div class="col-md-3">
                    <p class="fw-bold">Foto de entrega</p>
                    <img src="/img/dummy/entrega.jpg" class="img-fluid rounded border">
                </div>
            </div>
            <div class="text-end mt-3">
                <button class="btn btn-primary" type="button" onclick="mostrarTab('etapa4')">Continuar</button>
            </div>
        </div>

        <!-- Etapa 4 -->
        <div class="tab-pane fade" id="etapa4" role="tabpanel">
            <h5>4. Subida de Boleta a MOKE</h5>
            <p class="text-info">Verifique que la boleta haya sido correctamente subida al sistema MOKE y que incluya el precio crediticio correcto.</p>
            <div class="mb-3">
                <p class="fw-bold">Vista previa de boleta subida:</p>
                <img src="/img/dummy/boleta.png" class="img-fluid rounded border">
                <p class="mt-2">Verifique que el precio mostrado sea <strong>S/ 849.90</strong> y que los datos coincidan con el producto.</p>
            </div>
            <div class="text-end">
                <button class="btn btn-success">Finalizar Proceso</button>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarTab(tabId) {
        const tabTrigger = new bootstrap.Tab(document.querySelector(`[data-bs-target="#${tabId}"]`));
        tabTrigger.show();
    }
</script>
@endsection
