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

<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Dirección</label>
        <input type="text" class="form-control" value="{{ $cotizacion->direccion }}" disabled>
    </div>
</div>

<div class="row">
    {{-- Correo --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Correo electrónico</label>
        @if($cotizacion->correoElectronico())
            <input type="text" class="form-control" value="{{ $cotizacion->correoElectronico() }}" disabled>
        @else
            <div class="input-group">
                <input type="email" class="form-control" id="correo-input">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" onclick="guardarDato('correo', document.getElementById('correo-input').value)">Guardar</button>
                </div>
            </div>
        @endif
    </div>

    {{-- Teléfono --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Teléfono de contacto</label>
        @if($cotizacion->telefono())
            <input type="text" class="form-control" value="{{ $cotizacion->telefono() }}" disabled>
        @else
            <div class="input-group">
                <input type="text" class="form-control" id="telefono-input">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" onclick="guardarDato('telefono', document.getElementById('telefono-input').value)">Guardar</button>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="row">
    {{-- IMEI --}}
    <div class="col-md-6 mb-4">
        <label class="form-label">IMEI</label>
        @if($cotizacion->imei())
            <input type="text" class="form-control" value="{{ $cotizacion->imei() }}" disabled>
        @else
            <div class="input-group">
                <input type="text" class="form-control" id="imei-input">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" onclick="guardarDato('imei', document.getElementById('imei-input').value)">Guardar</button>
                </div>
            </div>
        @endif
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


@if(!$cotizacion->boleta())
    <button id="btn-generar-boleta" class="btn btn-success mt-3 float-left"
        onclick="generarBoleta()">
        Generar Boleta
    </button>
@else
<a href="{{ $boletaUrl }}" class="btn btn-secondary mt-3 float-left">
    Ver Boleta Generada
</a>
@endif

@if($vista_accion)
<button id="btn-goto-etapa2" class="btn btn-primary mt-3 float-right"
    onclick="avanzarEtapa({{ $cotizacion->id }})">
    Continuar a Validación Biométrica
</button>
@endif

