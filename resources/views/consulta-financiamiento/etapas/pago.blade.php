<h4 class="text-center">Etapa 5: Subida de Comprobante de Pago</h4>
<div class="text-center p-4 my-3 bg-light rounded border">
    <p>Sube el comprobante de pago (voucher, captura o constancia) para completar el proceso de financiamiento.</p>
    <div class="form-group mx-auto" style="max-width: 500px;">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="pago-file" accept="application/pdf,image/*">
            <label class="custom-file-label" for="pago-file">Seleccionar comprobante de pago...</label>
        </div>
    </div>
</div>
<div class="text-right mt-3">
    @if($vista_accion)
    <button type="button" class="btn btn-success" id="btn-finalizar-proceso" onclick="avanzarEtapa({{ $cotizacion->id }})">
        <i class="fas fa-flag-checkered"></i> Subir Comprobante y Finalizar
    </button>
    @endif
</div>
