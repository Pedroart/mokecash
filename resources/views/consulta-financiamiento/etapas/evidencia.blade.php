<h4 class="text-center mb-4">Etapa 3: Ingreso de Evidencias</h4>
<p class="text-muted text-center">Suba todos los documentos requeridos para completar el expediente.</p>

<div class="row">

    {{-- 1. Boleta firmada --}}
    <div class="col-md-6 form-group">
        <label for="file-boleta">1. Boleta firmada (PDF)</label>
        @if($cotizacion->boletafirmada())
            <div class="mb-2">
                <a href="{{ route('archivo.ver', $cotizacion->boletafirmada()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
            </div>
        @else
        <div class="custom-file">
            <input type="file" class="custom-file-input"
                id="file-boleta" accept="image/*"
                data-clave="boletafirmada"
                data-cotizacion="{{ $cotizacion->id }}"
                data-carpeta="uploads/evidencias"
                onchange="subirArchivo(this)">
            <label class="custom-file-label" for="file-boleta">Seleccionar archivo...</label>
        </div>
        @endif
    </div>

    {{-- 2. DNI superior --}}
    <div class="col-md-6 form-group">
        <label for="file-dni1">2. DNI cara superior (imagen)</label>
        @if($cotizacion->dniSuperior())
            <div class="mb-2">
                <a href="{{ route('archivo.ver', $cotizacion->dniSuperior()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
            </div>
        @else
        <div class="custom-file">
            <input type="file" class="custom-file-input"
            id="file-dni1" accept="image/*"
            data-clave="dni_superior"
            data-cotizacion="{{ $cotizacion->id }}"
            data-carpeta="uploads/evidencias"
            onchange="subirArchivo(this)">
            <label class="custom-file-label" for="file-dni1">Seleccionar archivo...</label>
        </div>
        @endif
    </div>

    {{-- 3. DNI inferior --}}
    <div class="col-md-6 form-group">
        <label for="file-dni2">3. DNI cara inferior (imagen)</label>
        @if($cotizacion->dniInferior())
            <div class="mb-2">
                <a href="{{ route('archivo.ver', $cotizacion->dniInferior()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
            </div>
        @else
        <div class="custom-file">
            <input type="file" class="custom-file-input"
            id="file-dni2" accept="image/*"
            data-clave="dni_inferior"
            data-cotizacion="{{ $cotizacion->id }}"
            data-carpeta="uploads/evidencias"
            onchange="subirArchivo(this)">
            <label class="custom-file-label" for="file-dni2">Seleccionar archivo...</label>
        </div>
        @endif
    </div>

    {{-- 4. Foto de sustento de entrega --}}
    <div class="col-md-6 form-group">
        <label for="file-entrega">4. Foto de sustento de entrega (imagen)</label>
        @if($cotizacion->pago())
            <div class="mb-2">
                <a href="{{ route('archivo.ver', $cotizacion->pago()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
            </div>
        @else
        <div class="custom-file">
            <input type="file" class="custom-file-input"
            id="file-entrega" accept="image/*"
            data-clave="pago"
            data-cotizacion="{{ $cotizacion->id }}"
            data-carpeta="uploads/evidencias"
            onchange="subirArchivo(this)">
            <label class="custom-file-label" for="file-entrega">Seleccionar archivo...</label>
        </div>
        @endif
    </div>

</div>

<div class="text-right mt-4">
    @if($vista_accion)
    <button type="button" id="btn-goto-etapa4" class="btn btn-primary" onclick="avanzarEtapa({{ $cotizacion->id }})" >Subir Evidencias y Continuar</button>
    @else
    <button class="btn btn-primary" onclick="location.reload();">
    Siguiente paso
    </button>
    @endif
</div>
