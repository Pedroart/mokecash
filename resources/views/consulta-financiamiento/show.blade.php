@extends('adminlte::page')

@section('title', 'Proceso de Crédito')

@section('content_header')
    <h1>Proceso de Crédito</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header p-0">
        {{-- Tab Navigation with Font Awesome Icons --}}
        <ul class="nav nav-tabs" id="procesoTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="etapa1-tab" data-toggle="tab" href="#etapa1" role="tab" aria-controls="etapa1" aria-selected="true">
                    1. Ingreso de Datos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="etapa2-tab" data-toggle="tab" href="#etapa2" role="tab" aria-controls="etapa2" aria-selected="false">
                    2. Validación Biométrica
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="etapa3-tab" data-toggle="tab" href="#etapa3" role="tab" aria-controls="etapa3" aria-selected="false">
                    3. Evidencias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="etapa4-tab" data-toggle="tab" href="#etapa4" role="tab" aria-controls="etapa4" aria-selected="false">
                    4. Subida a MOKE
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="etapa5-tab" data-toggle="tab" href="#etapa5" role="tab" aria-controls="etapa5" aria-selected="false">
                    5. Pago
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        {{-- Tab Content --}}
        <div class="tab-content" id="procesoTabsContent">

            {{-- ETAPA 1: Ingreso de Datos --}}
            <div class="tab-pane fade show active" id="etapa1" role="tabpanel" aria-labelledby="etapa1-tab">
                <h4 class="text-center mb-4">Proceso de Financiamiento - Etapa 1: Ingreso de Datos</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->nombre_cliente }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">DNI</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->dni_cliente }}" disabled>
                    </div>
                </div>

                {{ $cotizacion->etapasFaltantes() }}


                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Dirección</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->direccion }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->correoElectronico() ?? '' }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teléfono de contacto</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->telefono() ?? '' }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label">IMEI</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->imei() ?? '' }}" disabled>
                    </div>
                </div>

                <hr>
                <h5 class="text-center text-primary mb-3">Detalles del Crédito</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Producto</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->producto->nombre ?? 'Producto no disponible' }}" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Precio</label>
                        <input type="text" class="form-control" value="S/ {{ number_format($cotizacion->producto->precio ?? $cotizacion->monto, 2) }}" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Número de cuotas</label>
                        <input type="text" class="form-control" value="{{ $cotizacion->cuotas }}" disabled>
                    </div>
                </div>

            </div>

            {{-- ETAPA 2: Validación Biométrica --}}
            <div class="tab-pane fade" id="etapa2" role="tabpanel" aria-labelledby="etapa2-tab">
                <h4 class="text-center">Etapa 2: Validación Biométrica</h4>
                <div class="text-center p-4 my-3 bg-light rounded border">
                    <p class="text-success h5"><i class="fas fa-check-circle"></i> Enlace de validación biométrica enviado al cliente.</p>
                    <p class="text-muted mt-3">Esperando registro biométrico. Confirme con BackOffice cuando el cliente haya completado el procedimiento.</p>
                     <div class="spinner-border text-primary my-3" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p><em>Esperando confirmación...</em></p>
                </div>
                <div class="d-flex justify-content-between mt-4">
                     <button class="btn btn-outline-secondary" onclick="window.print()"><i class="fas fa-print"></i> Imprimir Borrador</button>
                     <button type="button" id="btn-goto-etapa3" class="btn btn-primary">Confirmar Validación y Continuar</button>
                </div>
            </div>

            {{-- ETAPA 3: Ingreso de Evidencias --}}
            <div class="tab-pane fade" id="etapa3" role="tabpanel" aria-labelledby="etapa3-tab">
                <h4 class="text-center mb-4">Etapa 3: Ingreso de Evidencias</h4>
                <p class="text-muted text-center">Suba todos los documentos requeridos para completar el expediente.</p>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="file-boleta">1. Boleta firmada (PDF)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-boleta" accept="application/pdf">
                            <label class="custom-file-label" for="file-boleta">Seleccionar archivo...</label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="file-dni1">2. DNI cara superior (imagen)</label>
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-dni1" accept="image/*">
                            <label class="custom-file-label" for="file-dni1">Seleccionar archivo...</label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="file-dni2">3. DNI cara inferior (imagen)</label>
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-dni2" accept="image/*">
                            <label class="custom-file-label" for="file-dni2">Seleccionar archivo...</label>
                        </div>
                    </div>
                     <div class="col-md-6 form-group">
                        <label for="file-entrega">4. Foto de sustento de entrega (imagen)</label>
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-entrega" accept="image/*">
                            <label class="custom-file-label" for="file-entrega">Seleccionar archivo...</label>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <button type="button" id="btn-goto-etapa4" class="btn btn-primary">Subir Evidencias y Continuar</button>
                </div>
            </div>

            {{-- ETAPA 4: Subida a MOKE --}}
            <div class="tab-pane fade" id="etapa4" role="tabpanel" aria-labelledby="etapa4-tab">
                <h4 class="text-center">Etapa 4: Subida de Boleta a MOKE</h4>
                 <div class="text-center p-4 my-3 bg-light rounded border">
                    <p>Sube la boleta de venta final al sistema MOKE para concluir el proceso de financiamiento.</p>
                     <div class="form-group mx-auto" style="max-width: 500px;">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="moke-file">
                            <label class="custom-file-label" for="moke-file">Seleccionar boleta final...</label>
                        </div>
                    </div>
                 </div>
                 <div class="text-right mt-3">
                    <button type="button" id="btn-goto-etapa5" class="btn btn-primary">Subir Boleta y Continuar a Pago</button>
                 </div>
            </div>

            {{-- ETAPA 5: Pago --}}
            <div class="tab-pane fade" id="etapa5" role="tabpanel" aria-labelledby="etapa5-tab">
                <h4 class="text-center">Etapa 5: Registro del Pago</h4>
                <div class="text-center p-4 my-3 bg-light rounded border">
                    <i class="fas fa-cash-register fa-3x text-success mb-3"></i>
                    <p>Registre el pago inicial o la primera cuota según corresponda para activar el crédito.</p>
                     <div class="form-group mx-auto" style="max-width: 500px;">
                        <label for="pago-monto">Monto Pagado (S/)</label>
                        <input type="number" step="0.01" class="form-control text-center" id="pago-monto" placeholder="e.g., 82.50">
                    </div>
                    <div class="form-group mx-auto" style="max-width: 500px;">
                        <label for="pago-codigo">Código de Operación / ID de Transacción</label>
                        <input type="text" class="form-control text-center" id="pago-codigo" placeholder="Ingrese el código de la transacción">
                    </div>
                    <button class="btn btn-success btn-lg mt-3"><i class="fas fa-flag-checkered"></i> Finalizar y Registrar Pago</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
$(document).ready(function () {
    // This is for showing the selected file name in custom file inputs
    bsCustomFileInput.init();

    // --- Tab Control Logic ---
    
    // Get references to all the tab anchor elements
    const tabs = {
        etapa1: $('#etapa1-tab'),
        etapa2: $('#etapa2-tab'),
        etapa3: $('#etapa3-tab'),
        etapa4: $('#etapa4-tab'),
        etapa5: $('#etapa5-tab'),
    };

    // Get references to all the 'continue' buttons
    const continueButtons = {
        toEtapa2: $('#btn-goto-etapa2'),
        toEtapa3: $('#btn-goto-etapa3'),
        toEtapa4: $('#btn-goto-etapa4'),
        toEtapa5: $('#btn-goto-etapa5'),
    };

    /**
     * Activates the next tab in the sequence.
     * @param {jQuery} completedTab - The jQuery object for the tab that was just completed.
     * @param {jQuery} nextTab - The jQuery object for the next tab to enable.
     */
    function goToNextStep(completedTab, nextTab) {
        // --- Here you can add form validation logic before proceeding ---
        // For example: if (!$('#form-etapa1')[0].checkValidity()) { ... return; }
        
        // Mark the completed tab with a checkmark icon
        completedTab.find('.status-icon')
            .removeClass('fa-play fa-lock')
            .addClass('fa-check');
        completedTab.addClass('text-success font-weight-bold');

        // Enable the next tab and mark it as active
        nextTab.removeClass('disabled');
        nextTab.find('.status-icon')
            .removeClass('fa-lock')
            .addClass('fa-play');

        // Programmatically switch to the next tab
        nextTab.tab('show');
    }

    // Event listener for continuing from Step 1 to Step 2
    continueButtons.toEtapa2.on('click', function() {
        goToNextStep(tabs.etapa1, tabs.etapa2);
    });

    // Event listener for continuing from Step 2 to Step 3
    continueButtons.toEtapa3.on('click', function() {
        goToNextStep(tabs.etapa2, tabs.etapa3);
    });

    // Event listener for continuing from Step 3 to Step 4
    continueButtons.toEtapa4.on('click', function() {
        // You might want to add validation here to ensure all files are selected
        goToNextStep(tabs.etapa3, tabs.etapa4);
    });
    
    // Event listener for continuing from Step 4 to Step 5
    continueButtons.toEtapa5.on('click', function() {
        goToNextStep(tabs.etapa4, tabs.etapa5);
    });
});
</script>
@endpush
