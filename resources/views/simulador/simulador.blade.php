@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Simulador de Crédito</h3>

            <form id="simulador-form" onsubmit="return false;">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI del Cliente</label>
                    <input type="text" class="form-control" id="dni" maxlength="8" placeholder="Ej: 12345678" required>
                </div>

                <div class="mb-3">
                    <label for="monto" class="form-label">Monto a financiar (S/)</label>
                    <input type="number" class="form-control" id="monto" placeholder="Ej: 1200" required>
                </div>

                <button type="button" class="btn btn-warning w-100" onclick="consultarCredito()">Consultar</button>
            </form>
        </div>
    </div>

    <div class="mt-4" id="resultado" style="display: none;">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="alert" id="alertaResultado">
                    <div id="calificacion-alerta" class="fw-bold"></div>
                </div>

                <div id="detalle-cliente" class="mt-3 small text-muted"></div>

                <h6 class="mt-4">Opciones de Financiamiento:</h6>
                <table class="table table-sm table-bordered text-center text-white bg-dark mt-2">
                    <thead>
                        <tr>
                            <th>Plazo (meses)</th>
                            <th>Cuota aproximada (S/)</th>
                        </tr>
                    </thead>
                    <tbody id="cuotas-lista"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function calcularCuota(monto, meses, tcea = 0.36) {
        const r = Math.pow(1 + tcea, 1 / 12) - 1;
        return (monto * r) / (1 - Math.pow(1 + r, -meses));
    }

    async function consultarCredito() {
        const dni = document.getElementById("dni").value.trim();
        const monto = parseFloat(document.getElementById("monto").value);

        const resultado = document.getElementById("resultado");
        const alerta = document.getElementById("alertaResultado");
        const calificacion = document.getElementById("calificacion-alerta");
        const detalle = document.getElementById("detalle-cliente");
        const listaCuotas = document.getElementById("cuotas-lista");

        resultado.style.display = "none";
        alerta.className = "alert alert-secondary";
        calificacion.textContent = "";
        detalle.innerHTML = "";
        listaCuotas.innerHTML = "";

        if (dni.length !== 8 || isNaN(monto) || monto <= 0) {
            alerta.className = "alert alert-danger";
            calificacion.textContent = "❌ DNI o monto inválido.";
            resultado.style.display = "block";
            return;
        }

        try {
            const response = await fetch(`/api/linea-credito?numeroDocumento=${dni}&tipoDocumento=PE2`);
            const json = await response.json();

            if (json.valid && json.data?.tieneLineaCredito) {
                const data = json.data;
                const nombre = data.nombre || "Cliente";
                const linea = data.lineaCredito;

                if (monto > linea) {
                    alerta.className = "alert alert-warning";
                    calificacion.innerHTML =
                        `⚠️ Monto excede línea de crédito.<br>Calificación: ✅ ${nombre}<br>Línea de crédito: S/ ${linea.toFixed(2)}`;
                } else {
                    alerta.className = "alert alert-success";
                    calificacion.innerHTML =
                        `Calificación: ✅ ${nombre}<br>Línea de crédito: S/ ${linea.toFixed(2)}`;
                }

                // Mostrar detalle del cliente
                let direccionesHtml = '';
                if (data.cuentasContrato && data.cuentasContrato.length > 0) {
                    direccionesHtml = '<ul>';
                    data.cuentasContrato.forEach((cuenta, i) => {
                        direccionesHtml += `<li>${cuenta.direccion}</li>`;
                    });
                    direccionesHtml += '</ul>';
                } else {
                    direccionesHtml = 'Sin direcciones registradas';
                }

                detalle.innerHTML = `
                    <p><strong>Segmentación:</strong> ${data.segmentacionCliente || 'N/A'}</p>
                    <p><strong>Direcciones:</strong> ${direccionesHtml}</p>
                `;

                const plazos = [3, 6, 12, 18, 24];
                plazos.forEach(p => {
                    const cuotaX = calcularCuota(monto, p).toFixed(2);
                    listaCuotas.innerHTML += `<tr><td>${p}</td><td>S/ ${cuotaX}</td></tr>`;
                });

            } else {
                alerta.className = "alert alert-warning";
                calificacion.textContent = `❌ ${json.message || 'No califica'}`;
            }

        } catch (error) {
            console.error("Error al consultar línea de crédito:", error);
            alerta.className = "alert alert-danger";
            calificacion.textContent = "❌ Error al conectar con el servidor.";
        }

        resultado.style.display = "block";
    }
</script>
@endsection
