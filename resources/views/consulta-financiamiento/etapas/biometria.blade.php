<h4 class="text-center">Etapa 2: Validación Biométrica</h4>
<div class="text-center p-4 my-3 bg-light rounded border">
    <p class="text-success h5"><i class="fas fa-check-circle"></i> Enlace de validación biométrica enviado al cliente.</p>
    <p class="text-muted mt-3">Esperando registro biométrico. Por favor, contacte al BackOffice vía WhatsApp para confirmar y continuar con el proceso.</p>
    <div class="spinner-border text-primary my-3" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <p><em>Esperando confirmación...</em></p>
</div>
<div class="d-flex justify-content-between mt-4">
    
@if(!$cotizacion->boleta())
    <button id="btn-generar-boleta" class="btn btn-success mt-3 float-left"
        onclick="generarBoleta()">
        Generar Boleta
    </button>
@else
@if($vista_accion)
<a href="{{ $boletaUrl }}" class="btn btn-secondary mt-3 float-left">
    Ver Boleta Generada
</a>
@endif
@endif

@if($vista_accion)
    <button type="button" id="btn-goto-etapa3" class="btn btn-primary" onclick="avanzarEtapa({{ $cotizacion->id }})" >Confirmar Validación y Continuar</button>
@else
<button class="btn btn-primary" onclick="location.reload();">
  Siguiente paso
</button>    
@endif
</div>
