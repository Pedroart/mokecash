<h4 class="text-center">Etapa 4: Emisión y Subida de la Factura a nombre de MOKE SAC</h4>
<div class="text-center p-4 my-3 bg-light rounded border">
    <p>Emite una Factura a nombre de <strong>MOKE SAC</strong> y súbela al sistema para concluir el proceso de financiamiento.</p>


    <div class="table-responsive" x-data>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th class="text-end">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cotizacion->productos as $index => $cp)
                    <tr x-data="{ editando: false, imei: '{{ $cp->imei }}' }">
                        <td>{{ $cp->producto->nombre ?? 'Producto ID: ' . $cp->producto_id }}</td>
                        <td class="text-end">S/ {{ number_format($cp->producto->precio ?? 0, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="text-end fw-bold">Total</td>
                    <td class="text-end fw-bold">S/ {{ number_format($cotizacion->producto->precio ?? $cotizacion->monto, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

{{-- 5. Boleta final --}}
<div class="form-group mx-auto" style="max-width: 500px;" x-data="{ archivoActual: '{{ $cotizacion->facturaMoke() }}', editando: false }">

    <template x-if="archivoActual && !editando">
        <div class="mb-2 input-group">
            @if($cotizacion->facturaMoke())
            <a href="{{ route('archivo.ver', $cotizacion->facturaMoke()) }}"
               target="_blank"
               class="btn btn-outline-success btn-sm">
               Ver boleta final actual
            </a>
            <div class="input-group-append ml-2">
                <button type="button" class="btn btn-outline-primary btn-sm" @click="editando = true">Reemplazar</button>
            </div>
            @endif
        </div>
    </template>

    <template x-if="!archivoActual || editando">
        <div class="custom-file">
            <input type="file"
                   class="custom-file-input"
                   id="moke-file"
                   accept="application/pdf,image/*"
                   data-clave="factura_moke"
                   data-cotizacion="{{ $cotizacion->id }}"
                   data-carpeta="uploads/evidencias"
                   onchange="subirArchivo(this)">
            <label class="custom-file-label" for="moke-file">Seleccionar boleta final...</label>
        </div>
    </template>

</div>

</div>
<div class="text-right mt-3">
    @if($vista_accion)
    <button type="button" id="btn-goto-etapa5" class="btn btn-primary"
    onclick="avanzarEtapa({{ $cotizacion->id }})">Subir Boleta y Continuar a Pago</button>
    @else
    <button class="btn btn-primary" onclick="verificarEtapaYContinuar();">
    Siguiente paso
    </button>
    @endif
</div>
