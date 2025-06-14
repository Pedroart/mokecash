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
    
<a href="{{ $boletaUrl }}" class="btn btn-secondary mt-3 float-left">
    Ver Boleta Generada
</a>

@if($vista_accion)
    <button type="button" id="btn-goto-etapa3" class="btn btn-primary" onclick="avanzarEtapa({{ $cotizacion->id }})" >Confirmar Validación y Continuar</button>
    
    @endif
</div>
