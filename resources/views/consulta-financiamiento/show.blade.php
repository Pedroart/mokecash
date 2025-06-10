@php
    $etapaActual = $cotizacion->etapaActual() ?? 'pago';
    $etapas = [
        ['id' => 'etapa1', 'nombre' => 'Ingreso de Datos', 'clave' => 'ingreso'],
        ['id' => 'etapa2', 'nombre' => 'Validación Biométrica', 'clave' => 'biometria'],
        ['id' => 'etapa3', 'nombre' => 'Evidencias', 'clave' => 'evidencia'],
        ['id' => 'etapa4', 'nombre' => 'Subida a MOKE', 'clave' => 'moke'],
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

            <div class="tab-pane fade {{ $etapaActual === 'evidencia' ? 'show active' : '' }}" id="etapa3" role="tabpanel" aria-labelledby="etapa3-tab">
                @include('consulta-financiamiento.etapas.evidencia')
            </div>

            <div class="tab-pane fade {{ $etapaActual === 'moke' ? 'show active' : '' }}" id="etapa4" role="tabpanel" aria-labelledby="etapa4-tab">
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
$(document).ready(function () {
    bsCustomFileInput.init();

    const tabs = {
        etapa1: $('#etapa1-tab'),
        etapa2: $('#etapa2-tab'),
        etapa3: $('#etapa3-tab'),
        etapa4: $('#etapa4-tab'),
        etapa5: $('#etapa5-tab'),
    };

    const continueButtons = {
        toEtapa2: $('#btn-goto-etapa2'),
        toEtapa3: $('#btn-goto-etapa3'),
        toEtapa4: $('#btn-goto-etapa4'),
        toEtapa5: $('#btn-goto-etapa5'),
    };

    function goToNextStep(completedTab, nextTab) {
        completedTab.removeClass('active').addClass('disabled');
        nextTab.removeClass('disabled').tab('show');
    }

    continueButtons.toEtapa2?.on('click', () => goToNextStep(tabs.etapa1, tabs.etapa2));
    continueButtons.toEtapa3?.on('click', () => goToNextStep(tabs.etapa2, tabs.etapa3));
    continueButtons.toEtapa4?.on('click', () => goToNextStep(tabs.etapa3, tabs.etapa4));
    continueButtons.toEtapa5?.on('click', () => goToNextStep(tabs.etapa4, tabs.etapa5));
});

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
</script>
@endpush
