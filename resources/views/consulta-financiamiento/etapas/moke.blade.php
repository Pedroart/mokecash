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
    @if($vista_accion)
    <button type="button" id="btn-goto-etapa5" class="btn btn-primary">Subir Boleta y Continuar a Pago</button>
    @endif
</div>
