@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg mb-4">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Simulador de Crédito</h3>

            <form onsubmit="return false;">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI del Cliente</label>
                    <input type="text" class="form-control" id="dni" maxlength="8" placeholder="Ej: 12345678" required>
                </div>

                <button type="button" class="btn btn-warning w-100" onclick="consultarCliente()">Consultar</button>
            </form>
        </div>
    </div>

    <div class="row" id="simulador-container" style="display: none;">
        <div class="col-md-5">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="text-center">📊 Detalles de Financiamiento</h5>
                    <div id="detalle-cliente" class="small text-muted mb-3"></div>
                    <div id="detalle-producto" class="mb-3"></div>
                    <table class="table table-sm table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Plazo (meses)</th>
                                <th>Cuota (S/)</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-cuotas"></tbody>
                    </table>
                    <div class="d-grid mt-3">
                        <button class="btn btn-success" onclick="continuarProceso()">Continuar Proceso</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="text-center mb-3">📱 Equipos disponibles</h5>
                    <div id="grid-celulares" class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const clientesDummy = {
        "12345678": {
            nombre: "Luis Ramírez",
            lineaCredito: 1500,
            direccion: "Av. Las Flores 123",
            segmentacion: "Cliente Frecuente"
        },
        "87654321": {
            nombre: "María Fernández",
            lineaCredito: 2500,
            direccion: "Calle Lima 456",
            segmentacion: "Nuevo Cliente"
        },
        "00000000": {
            nombre: "Prueba Demo",
            lineaCredito: 1000,
            direccion: "Jr. Simulación 999",
            segmentacion: "Demo"
        }
    };

    const celularesDisponibles = [
        { modelo: "Xiaomi Redmi 12", precio: 699.00 },
        { modelo: "Samsung A14", precio: 849.90 },
        { modelo: "Motorola G73", precio: 1299.99 },
        { modelo: "iPhone SE", precio: 1699.00 },
        { modelo: "Realme C53", precio: 749.90 },
        { modelo: "Honor X8", precio: 1399.90 },
        { modelo: "Samsung M14", precio: 899.90 }
    ];

    let lineaCreditoActual = 0;

    function calcularCuota(monto, meses, tcea = 0.36) {
        const r = Math.pow(1 + tcea, 1 / 12) - 1;
        return (monto * r) / (1 - Math.pow(1 + r, -meses));
    }

    function consultarCliente() {
        const dni = document.getElementById("dni").value.trim();
        const container = document.getElementById("simulador-container");
        const detalle = document.getElementById("detalle-cliente");
        const grid = document.getElementById("grid-celulares");

        if (dni.length !== 8 || !clientesDummy[dni]) {
            alert("❌ DNI inválido o cliente no encontrado.");
            container.style.display = "none";
            return;
        }

        const cliente = clientesDummy[dni];
        lineaCreditoActual = cliente.lineaCredito;

        detalle.innerHTML = `
            <p><strong>Cliente:</strong> ${cliente.nombre}</p>
            <p><strong>Línea de Crédito:</strong> S/ ${cliente.lineaCredito.toFixed(2)}</p>
            <p><strong>Dirección:</strong> ${cliente.direccion}</p>
            <p><strong>Segmentación:</strong> ${cliente.segmentacion}</p>
        `;

        // Generar grid de celulares
        grid.innerHTML = celularesDisponibles
            .filter(cel => cel.precio <= lineaCreditoActual)
            .map(cel => `
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h6 class="card-title">${cel.modelo}</h6>
                            <p class="card-text">S/ ${cel.precio.toFixed(2)}</p>
                            <button class="btn btn-outline-primary btn-sm" onclick='seleccionarProducto(${JSON.stringify(cel)})'>Ver cuotas</button>
                        </div>
                    </div>
                </div>
            `).join('');

        document.getElementById("tabla-cuotas").innerHTML = "";
        document.getElementById("detalle-producto").innerHTML = "<em>Selecciona un celular para ver las cuotas</em>";
        container.style.display = "flex";
    }

    function seleccionarProducto(celular) {
        document.getElementById("detalle-producto").innerHTML = `
            <p><strong>Producto seleccionado:</strong> ${celular.modelo}</p>
            <p><strong>Precio:</strong> S/ ${celular.precio.toFixed(2)}</p>
        `;

        const tabla = document.getElementById("tabla-cuotas");
        tabla.innerHTML = "";
        const plazos = [3, 6, 12, 18, 24];

        plazos.forEach(p => {
            const cuota = calcularCuota(celular.precio, p).toFixed(2);
            tabla.innerHTML += `<tr><td>${p}</td><td>S/ ${cuota}</td></tr>`;
        });
    }
</script>
@endsection
