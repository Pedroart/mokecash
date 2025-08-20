<h4 class="text-center mb-4">Proceso de Financiamiento - Etapa 1: Ingreso de Datos</h4>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" value="{{ $cotizacion->nombre_cliente }}" disabled>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">DNI</label>
        <input type="text" class="form-control" value="{{ $cotizacion->dni_cliente }}" disabled>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-3">
        <label class="form-label">Dirección</label>
        <input type="text" class="form-control" value="{{ $cotizacion->direccion }}" disabled>
    </div>
</div>

<div class="row">
    {{-- Correo --}}
    <div class="col-md-6 mb-3" x-data="{ editando: false, correo: '{{ $cotizacion->correoElectronico() }}' }">
        <label class="form-label">Correo electrónico*</label>

        {{-- Si ya existe correo --}}
        @if($cotizacion->correoElectronico())
            <template x-if="!editando">
                <div class="input-group">
                    <input type="text" class="form-control" :value="correo" disabled>
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" @click="editando = true">Editar</button>
                    </div>
                </div>
            </template>

            <template x-if="editando">
                <div class="input-group">
                    <input type="email" class="form-control" x-model="correo">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" @click="guardarDato('correo', correo); editando = false">Guardar</button>
                    </div>
                </div>
            </template>
        @else
            {{-- Si no existe correo aún --}}
            <div class="input-group">
                <input type="email" class="form-control" x-model="correo" placeholder="Ingrese el correo">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" @click="guardarDato('correo', correo)">Guardar</button>
                </div>
            </div>
        @endif
    </div>

    <div class="col-md-6 mb-3" x-data="{ editandoTel: false, telefono: '{{ $cotizacion->telefono() }}' }">
        <label class="form-label">Teléfono de contacto*</label>

        @if($cotizacion->telefono())
            <template x-if="!editandoTel">
                <div class="input-group">
                    <input type="text" class="form-control" :value="telefono" disabled>
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" @click="editandoTel = true">Editar</button>
                    </div>
                </div>
            </template>

            <template x-if="editandoTel">
                <div class="input-group">
                    <input type="text" class="form-control" x-model="telefono">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" @click="guardarDato('telefono', telefono); editandoTel = false">Guardar</button>
                    </div>
                </div>
            </template>
        @else
            <div class="input-group">
                <input type="text" class="form-control" x-model="telefono" placeholder="Ingrese el número">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" @click="guardarDato('telefono', telefono)">Guardar</button>
                </div>
            </div>
        @endif
    </div>

</div>

<hr>
<h5 class="text-center text-primary mb-3">Detalles del Crédito</h5>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Número de cuotas</label>
        <input type="text" class="form-control" value="{{ $cotizacion->cuotas }}" disabled>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Precio al contado</label>
        <input type="text" class="form-control" value="S/ {{ number_format($cotizacion->producto->precio ?? $cotizacion->monto, 2) }}" disabled>
    </div>
    @if($vista_accion)
    <div class="col-md-4 mb-3">
        <label class="form-label">Precio de Financiamiento</label>
        <input type="text" class="form-control" value="S/ {{ number_format($cotizacion->monto_financiado, 2) }}" disabled>
    </div>
    @endif
</div>

<div class="table-responsive" x-data>
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Producto</th>
                <th class="text-end">Precio</th>
                <th>IMEI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cotizacion->productos as $index => $cp)
                <tr x-data="{ editando: false, imei: '{{ $cp->imei }}' }">
                    <td>{{ $cp->producto->nombre ?? 'Producto ID: ' . $cp->producto_id }}</td>
                    <td class="text-end">S/ {{ number_format($cp->precio ?? 0, 2) }}</td>
                    <td>
                        {{-- Si hay IMEI, mostrar campo con botón editar --}}
                        @if($cp->imei)
                            <template x-if="!editando">
                                <div class="input-group">
                                    <input type="text" class="form-control" :value="imei" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" @click="editando = true">Editar</button>
                                    </div>
                                </div>
                            </template>

                            <template x-if="editando">
                                <div class="input-group">
                                    <input type="text" class="form-control" x-model="imei">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success"
                                                @click="guardarIMEI({{ $cp->id }}, imei); editando = false">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </template>
                        @else
                            {{-- Si no hay IMEI aún --}}
                            <div class="input-group">
                                <input type="text" class="form-control" x-model="imei" placeholder="Ingrese IMEI">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" @click="guardarIMEI({{ $cp->id }}, imei)">Guardar</button>
                                </div>    
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@if($vista_accion)
<button id="btn-goto-etapa2" class="btn btn-primary mt-3 float-right"
    onclick="avanzarEtapa({{ $cotizacion->id }})">
    Continuar a Validación Biométrica
</button>
@else
<button class="btn btn-primary" onclick="verificarEtapaYContinuar();">
  Siguiente paso
</button>
@endif

