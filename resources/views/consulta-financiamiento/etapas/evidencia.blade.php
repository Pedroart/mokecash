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
    @if($vista_accion)
    <button type="button" id="btn-goto-etapa4" class="btn btn-primary" onclick="avanzarEtapa({{ $cotizacion->id }})" >Subir Evidencias y Continuar</button>
    @endif
</div>
