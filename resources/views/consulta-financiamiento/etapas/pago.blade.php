<h4 class="text-center">Etapa 5: Subida de Comprobante de Pago</h4>
<div class="text-center p-4 my-3 bg-light rounded border" x-data="{ archivoActual: '{{ $cotizacion->pago() }}', editando: false }">
    <p>Sube el comprobante de pago (voucher, captura o constancia) para completar el proceso de financiamiento.</p>

    <div class="form-group mx-auto" style="max-width: 500px;">
        <template x-if="archivoActual && !editando">
            <div class="mb-2 input-group justify-content-center">
                @if($cotizacion->pago())
                <a href="{{ route('archivo.ver', $cotizacion->pago()) }}"
                   target="_blank"
                   class="btn btn-outline-success btn-sm">
                   Ver comprobante actual
                </a>
                @if($vista_accion)
                <div class="input-group-append ml-2">
                    <button type="button" class="btn btn-outline-primary btn-sm" @click="editando = true">Reemplazar</button>
                </div>
                @endif
                @endif
            </div>
        </template>
        @if($vista_accion)
        <template x-if="!archivoActual || editando">
            <div class="custom-file">
                <input type="file"
                       class="custom-file-input"
                       id="pago-file"
                       accept="application/pdf,image/*"
                       data-clave="pago"
                       data-cotizacion="{{ $cotizacion->id }}"
                       data-carpeta="uploads/evidencias"
                       onchange="subirArchivo(this)">
                <label class="custom-file-label" for="pago-file">Seleccionar comprobante de pago...</label>
            </div>
        </template>
        @endif
    </div>
</div>

<div class="text-right mt-3">
    @if($vista_accion)
    <button type="button" class="btn btn-success" id="btn-finalizar-proceso" onclick="avanzarEtapa({{ $cotizacion->id }})">
        <i class="fas fa-flag-checkered"></i> Subir Comprobante y Finalizar
    </button>
    @endif
</div>
