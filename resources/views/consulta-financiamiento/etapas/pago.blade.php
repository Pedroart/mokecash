<h4 class="text-center">Etapa 5: Registro del Pago</h4>
<div class="text-center p-4 my-3 bg-light rounded border">
    <i class="fas fa-cash-register fa-3x text-success mb-3"></i>
    <p>Registre el pago inicial o la primera cuota según corresponda para activar el crédito.</p>
    <div class="form-group mx-auto" style="max-width: 500px;">
        <label for="pago-monto">Monto Pagado (S/)</label>
        <input type="number" step="0.01" class="form-control text-center" id="pago-monto" placeholder="e.g., 82.50">
    </div>
    <div class="form-group mx-auto" style="max-width: 500px;">
        <label for="pago-codigo">Código de Operación / ID de Transacción</label>
        <input type="text" class="form-control text-center" id="pago-codigo" placeholder="Ingrese el código de la transacción">
    </div>
    @if($vista_accion)
    <button class="btn btn-success btn-lg mt-3"><i class="fas fa-flag-checkered"></i> Finalizar y Registrar Pago</button>
    @endif
</div>
