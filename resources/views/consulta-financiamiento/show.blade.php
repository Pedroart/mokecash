@php
    $etapaActual = $cotizacion->etapaActual() ?? 'pago';
    $etapas = [
        ['id' => 'etapa1', 'nombre' => 'Ingreso de Datos', 'clave' => 'ingreso'],
        ['id' => 'etapa2', 'nombre' => 'Validación Biométrica', 'clave' => 'biometria'],
        ['id' => 'etapa3', 'nombre' => 'Evidencias', 'clave' => 'validacion'],
        ['id' => 'etapa4', 'nombre' => 'Subida a MOKE', 'clave' => 'boleta'],
        ['id' => 'etapa5', 'nombre' => 'Pago', 'clave' => 'pago'],
    ];
    $indiceEtapaActual = collect($etapas)->pluck('clave')->search($etapaActual);
@endphp

@extends('adminlte::page')

@section('title', 'Proceso de Crédito')

@section('content_header')
    <h1>Proceso de Crédito</h1>
@stop

@section('content')

{{$cotizacion->etapaActual() }}

<div class="card">
    <div class="card-header p-0">
        {{-- Tabs dinámicas --}}
        <ul class="nav nav-tabs" id="procesoTabs" role="tablist">
            @foreach ($etapas as $index => $etapa)
                @php
                    $enabled = $index <= $indiceEtapaActual;
                @endphp
                <li class="nav-item">
                    <a class="nav-link {{ $enabled ? '' : 'disabled' }} {{ $index === $indiceEtapaActual ? 'active' : '' }}"
                        id="{{ $etapa['id'] }}-tab"
                        data-toggle="tab"
                        href="#{{ $etapa['id'] }}"
                        role="tab"
                        aria-controls="{{ $etapa['id'] }}"
                        aria-selected="{{ $index === $indiceEtapaActual ? 'true' : 'false' }}">
                        {{ $index + 1 }}. {{ $etapa['nombre'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="procesoTabsContent">
            {{-- Aquí se conserva tu contenido original, por ejemplo: --}}

            <div class="tab-pane fade {{ $etapaActual === 'ingreso' ? 'show active' : '' }}" id="etapa1" role="tabpanel" aria-labelledby="etapa1-tab">
                @include('consulta-financiamiento.etapas.ingreso') {{-- Puedes mantener el contenido inline o extraerlo a un include --}}
            </div>

            <div class="tab-pane fade {{ $etapaActual === 'biometria' ? 'show active' : '' }}" id="etapa2" role="tabpanel" aria-labelledby="etapa2-tab">
                @include('consulta-financiamiento.etapas.biometria')
            </div>

            <div class="tab-pane fade {{ $etapaActual === 'validacion' ? 'show active' : '' }}" id="etapa3" role="tabpanel" aria-labelledby="etapa3-tab">
                @include('consulta-financiamiento.etapas.evidencia')
            </div>

            <div class="tab-pane fade {{ $etapaActual === 'boleta' ? 'show active' : '' }}" id="etapa4" role="tabpanel" aria-labelledby="etapa4-tab">
                @include('consulta-financiamiento.etapas.moke')
            </div>

            <div class="tab-pane fade {{ $etapaActual === 'pago' ? 'show active' : '' }}" id="etapa5" role="tabpanel" aria-labelledby="etapa5-tab">
                @include('consulta-financiamiento.etapas.pago')
            </div>

        </div>
    </div>
</div>
@stop

@push('js')
<script>

function avanzarEtapa(id) {
    const url = `/cotizacion/${id}/avanzar-etapa`; // O usa la ruta nombrada con Blade
    window.location.href = url;
}

function guardarDato(clave, valor) {
    if (!valor.trim()) {
        alert('El valor no puede estar vacío');
        return;
    }

    fetch('{{ url('/api/archivador-procesos') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            cotizacion_id: {{ $cotizacion->id }},
            clave: clave,
            valor: valor
        })
    })
    .then(async res => {
        if (!res.ok) {
            const errorText = await res.text();
            console.error('❌ Error HTTP:', res.status, errorText);
            alert('Error al guardar (HTTP)');
            return;
        }

        return res.json();
    })
    .then(data => {
        if (data?.success) {
            alert('Dato guardado correctamente');
            location.reload();
        } else {
            console.error('⚠️ Respuesta inesperada:', data);
            alert('Error al guardar');
        }
    })
    .catch(err => {
        console.error('❌ Error de red o JS:', err);
        alert('Error de conexión');
    });

}

function generarBoleta() {
    const data = {
        sku: '{{ $cotizacion->producto->codigo ?? 'PRD001' }}',
        descripcion: '{{ $cotizacion->producto->nombre ?? 'Producto sin nombre' }}',
        precio_con_igv: {{ $cotizacion->producto->precio ?? $cotizacion->monto }},
        cantidad: 1,
        cliente_nombre: '{{ $cotizacion->nombre_cliente }}',
        cliente_documento: '{{ $cotizacion->dni_cliente }}',
        cliente_direccion: '{{ $cotizacion->direccion }}',
        lugar_venta: '{{ $cotizacion->tienda->nombre ?? "Tienda Principal" }}'
    };

    fetch('{{ url('/api/boletas') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
    })
    .then(async res => {
        if (!res.ok) {
            const err = await res.text();
            console.error('❌ Error HTTP:', res.status, err);
            alert('Error al generar la boleta');
            return;
        }
        return res.json();
    })
    .then(data => {
        if (data?.success) {
            alert('✅ Boleta generada con éxito. Número: ' + data.numero_boleta);

            // Desactiva el botón
            document.getElementById('btn-generar-boleta').disabled = true;

            // Guarda el ID de la boleta en la cotización
            guardarDato('boleta_id', data.boleta_id);
        } else {
            console.error('⚠️ Respuesta inesperada:', data);
            alert('No se pudo generar la boleta');
        }
    })
    .catch(err => {
        console.error('❌ Error de red:', err);
        alert('Error de conexión');
    });
}

</script>
@endpush
