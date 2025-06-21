@php
    $etapaActual = $cotizacion->etapaActual() ?? 'pago';
    $etapas = [
        ['id' => 'etapa1', 'nombre' => 'Ingreso de Datos', 'clave' => 'ingreso'],
        ['id' => 'etapa2', 'nombre' => 'Validación Biométrica', 'clave' => 'biometria'],
        ['id' => 'etapa3', 'nombre' => 'Evidencias', 'clave' => 'validacion'],
        ['id' => 'etapa4', 'nombre' => 'Emitir Factura a Moke', 'clave' => 'boleta'],
        ['id' => 'etapa5', 'nombre' => 'Revisar Pago de Moke', 'clave' => 'pago'],
    ];
    $indiceEtapaActual = collect($etapas)->pluck('clave')->search($etapaActual);
    
    try {
        $boletaId = $cotizacion->boleta() ?: 1;
        $boletaUrl = route('boletas.show', ['boleta' => $boletaId]);
    } catch (\Throwable $e) {
        $boletaUrl = '#'; // Fallback seguro
    }
@endphp


@extends('adminlte::page')

@section('title', 'Proceso de Crédito')

@section('content_header')
    <h1>Proceso de Crédito</h1>
@stop

@section('content')

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

function verificarEtapaYContinuar() {
    fetch(`/cotizacion/{{ $cotizacion->id }}/etapa`)
        .then(response => response.json())
        .then(data => {
            const etapaServidor = data.etapa_actual;
            const etapaLocal = '{{ $etapaActual }}';

            if (etapaServidor !== etapaLocal) {
                location.reload();
            } else {
                alert('Aún no puedes avanzar. Espera la autorización de BackOffice.');
            }
        })
        .catch(error => {
            console.error('Error al consultar la etapa:', error);
            alert('Ocurrió un error al verificar la etapa.');
        });
}

function avanzarEtapa(id) {
    const url = `/cotizacion/${id}/avanzar-etapa`; // O usa la ruta nombrada con Blade
    window.location.href = url;
}

function guardarDato(clave, valor) {
    if (typeof valor === 'string' && !valor.trim()) {
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
        const text = await res.text();
        try {
            const data = JSON.parse(text);
            if (data?.success) {
                alert('Dato guardado correctamente');
                location.reload();
            } else {
                console.error('⚠️ Respuesta inesperada:', data);
                alert('Error al guardar');
            }
        } catch (e) {
            console.error('❌ No es JSON válido:', text);
            alert('Respuesta no válida del servidor');
        }
    })
    .catch(err => {
        console.error('❌ Error de red o JS:', err);
        alert('Error de conexión');
    });
}

function generarBoleta() {
    const data = {
        cotizacion: '{{ $cotizacion->id }}',
        descripcion: '{{ $cotizacion->producto->nombre ?? 'Producto sin nombre' }}',
        precio_con_igv: {{ $cotizacion->monto_financiado }},
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
        const text = await res.text();
        try {
            const data = JSON.parse(text);
            if (data?.success) {
                alert('✅ Boleta generada con éxito. Número: ' + data.numero_boleta);
                document.getElementById('btn-generar-boleta').disabled = true;
                guardarDato('boleta', String(data.boleta_id));
            } else {
                console.error('⚠️ Respuesta inesperada:', data);
                alert('No se pudo generar la boleta');
            }
        } catch (e) {
            console.error('❌ No es JSON válido:', text);
            alert('Respuesta inválida del servidor');
        }
    })
    .catch(err => {
        console.error('❌ Error de red:', err);
        alert('Error de conexión');
    });
}


function subirArchivo(input) {
    const file = input.files[0];
    if (!file) {
        alert('No se seleccionó ningún archivo');
        return;
    }

    const clave = input.dataset.clave;
    const cotizacionId = input.dataset.cotizacion;
    const carpeta = input.dataset.carpeta;

    const formData = new FormData();
    formData.append("file", file, file.name);
    formData.append("nombre", file.name);
    formData.append("clave", clave);
    formData.append("cotizacion_id", cotizacionId);
    formData.append("carpeta", carpeta);

    fetch("{{ url('/api/evidencias') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(async res => {
        const text = await res.text();
        try {
            const data = JSON.parse(text);
            if (res.ok) {
                alert("✅ Archivo subido correctamente");
                location.reload();
            } else {
                console.error("⚠️ Error del servidor:", data);
                alert("❌ Falló la subida del archivo");
            }
        } catch (e) {
            console.error("❌ No es JSON válido:", text);
            alert("❌ Respuesta no válida del servidor");
        }
    })
    .catch(err => {
        console.error("❌ Error de red:", err);
        alert("❌ Error de conexión");
    });
}


function guardarIMEI(id, imei) {
    fetch('/cotizacion-producto/' + id + '/imei', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        },
        body: JSON.stringify({ imei })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('IMEI guardado correctamente');
        } else {
            alert('Error al guardar el IMEI');
        }
    })
    .catch(error => {
        console.error('Error al guardar:', error);
        alert('Fallo al guardar IMEI');
    });
}



</script>
@endpush
