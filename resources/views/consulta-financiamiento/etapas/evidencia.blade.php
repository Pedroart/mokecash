<h4 class="text-center mb-4">Etapa 3: Ingreso de Evidencias</h4>
<p class="text-muted text-center">Suba todos los documentos requeridos para completar el expediente.</p>

<div class="row text-center">

    <div class="col-md-6 form-group" x-data="{ archivoActual: '{{ $cotizacion->boletafirmada() }}', editando: false }">
        

        <label for="file-boleta">1. Boleta firmada</label>

        <div class="mb-2">
            <img src="/imagenes/firmayHuella.png" alt="Ejemplo de boleta firmada" class="img-fluid border rounded shadow-sm" style="width: 50%; aspect-ratio: 1 / 1; object-fit: fill;">
            <small class="form-text text-muted">Ejemplo de cómo debe verse firmada y huella claras.</small>
        </div>

        <template x-if="archivoActual && !editando">
            @if($cotizacion->boletafirmada())
            <div class="mb-2 input-group">
                <a href="{{ route('archivo.ver', $cotizacion->boletafirmada()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
                <div class="input-group-append ml-2">
                    <button type="button" class="btn btn-outline-primary btn-sm" @click="editando = true">Reemplazar</button>
                </div>
            </div>
            @endif
        </template>
        
        <template x-if="!archivoActual || editando">
            <div class="custom-file">
                <input type="file" class="custom-file-input"
                    id="file-boleta"
                    accept="image/*"
                    data-clave="boletafirmada"
                    data-cotizacion="{{ $cotizacion->id }}"
                    data-carpeta="uploads/evidencias"
                    onchange="subirArchivo(this)">
                <label class="custom-file-label" for="file-boleta">Seleccionar archivo...</label>
            </div>
        </template>
        
    </div>


    {{-- 2. DNI superior --}}
    <div class="col-md-6 form-group" x-data="{ archivoActual: '{{ $cotizacion->dniSuperior() }}', editando: false }">
        <label for="file-dni1">2. DNI cara superior (imagen)</label>

        <div class="mb-2">
            <img src="/imagenes/dniSuperior.jpg" alt="Ejemplo de boleta firmada" class="img-fluid border rounded shadow-sm" style="width: 50%; aspect-ratio: 1 / 1; object-fit: fill;">
            <small class="form-text text-muted">Ejemplo de cómo debe verse DNI cara superior.</small>
        </div>

        <template x-if="archivoActual && !editando">
            <div class="mb-2 input-group">
                @if($cotizacion->dniSuperior())
                <a href="{{ route('archivo.ver', $cotizacion->dniSuperior()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
                <div class="input-group-append ml-2">
                    <button type="button" class="btn btn-outline-primary btn-sm" @click="editando = true">Reemplazar</button>
                </div>
                @endif
            </div>
        </template>

        <template x-if="!archivoActual || editando">
            <div class="custom-file">
                <input type="file" class="custom-file-input"
                    id="file-dni1"
                    accept="image/*"
                    data-clave="dni_superior"
                    data-cotizacion="{{ $cotizacion->id }}"
                    data-carpeta="uploads/evidencias"
                    onchange="subirArchivo(this)">
                <label class="custom-file-label" for="file-dni1">Seleccionar archivo...</label>
            </div>
        </template>
    </div>


    {{-- 3. DNI inferior --}}
    <div class="col-md-6 form-group" x-data="{ archivoActual: '{{ $cotizacion->dniInferior() }}', editando: false }">
        <label for="file-dni2">3. DNI cara inferior (imagen)</label>

        <div class="mb-2">
            <img src="/imagenes/dniInferior.jpg" alt="Ejemplo de boleta firmada" class="img-fluid border rounded shadow-sm" style="width: 50%; aspect-ratio: 1 / 1; object-fit: fill;">
            <small class="form-text text-muted">Ejemplo de cómo debe verse DNI cara inferior.</small>
        </div>

        <template x-if="archivoActual && !editando">
            <div class="mb-2 input-group">
                @if($cotizacion->dniInferior())
                <a href="{{ route('archivo.ver', $cotizacion->dniInferior()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
                <div class="input-group-append ml-2">
                    <button type="button" class="btn btn-outline-primary btn-sm" @click="editando = true">Reemplazar</button>
                </div>
                @endif
            </div>
        </template>

        <template x-if="!archivoActual || editando">
            <div class="custom-file">
                <input type="file" class="custom-file-input"
                    id="file-dni2"
                    accept="image/*"
                    data-clave="dni_inferior"
                    data-cotizacion="{{ $cotizacion->id }}"
                    data-carpeta="uploads/evidencias"
                    onchange="subirArchivo(this)">
                <label class="custom-file-label" for="file-dni2">Seleccionar archivo...</label>
            </div>
        </template>
    </div>


    {{-- 4. Foto de sustento de entrega --}}
    <div class="col-md-6 form-group" x-data="{ archivoActual: '{{ $cotizacion->pago() }}', editando: false }">
        <label for="file-entrega">4. Foto de sustento de entrega (imagen)</label>

        <div class="mb-2">
            <img src="/imagenes/fotoproducto.png" alt="Ejemplo de boleta firmada" class="img-fluid border rounded shadow-sm" style="width: 50%; aspect-ratio: 1 / 1; object-fit: fill;">
            <small class="form-text text-muted">Ejemplo de cómo debe ser la foto de sustento de entrega del producto:
    La imagen debe mostrar al cliente de forma nítida, sosteniendo el producto y la boleta de venta, sin ningún elemento que cubra el rostro (como mascarilla, lentes oscuros, gorros, etc.).
    La foto debe tomarse dentro de las instalaciones de la tienda o local.</small>
        </div>

        <template x-if="archivoActual && !editando">
            <div class="mb-2 input-group">
                @if($cotizacion->pago())
                <a href="{{ route('archivo.ver', $cotizacion->pago()) }}" target="_blank" class="btn btn-outline-success btn-sm">
                    Ver archivo actual
                </a>
                <div class="input-group-append ml-2">
                    <button type="button" class="btn btn-outline-primary btn-sm" @click="editando = true">Reemplazar</button>
                </div>
                @endif
            </div>
        </template>

        <template x-if="!archivoActual || editando">
            <div class="custom-file">
                <input type="file" class="custom-file-input"
                    id="file-entrega"
                    accept="image/*"
                    data-clave="pago"
                    data-cotizacion="{{ $cotizacion->id }}"
                    data-carpeta="uploads/evidencias"
                    onchange="subirArchivo(this)">
                <label class="custom-file-label" for="file-entrega">Seleccionar archivo...</label>
            </div>
        </template>
    </div>


</div>

<div class="text-right mt-4">
    @if($vista_accion)
    <button type="button" id="btn-goto-etapa4" class="btn btn-primary" onclick="avanzarEtapa({{ $cotizacion->id }})" >Subir Evidencias y Continuar</button>
    @else
    <button class="btn btn-primary" onclick="verificarEtapaYContinuar();">
    Siguiente paso
    </button>
    @endif
</div>
