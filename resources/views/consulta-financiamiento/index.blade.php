@extends('adminlte::page')

@section('title', 'Simulador de Crédito')

@section('content_header')
    <h1>Simulador de Crédito</h1>
@endsection

@section('content')

<!-- Modal de Confirmación -->
<div class="modal fade" id="modalGuardarProceso" tabindex="-1" role="dialog" aria-labelledby="guardarProcesoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="form-guardar-proceso" method="POST" action="{{ route('cotizacions.store') }}">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guardarProcesoLabel">Confirmar Proceso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="tienda_id" id="input-tienda" value="{{ $tienda_id }}">
                <input type="hidden" name="vendedor_id" id="input-vendedor" value="{{ $vendor_id }}">

                <input type="hidden" name="producto_id" id="input-producto">
                <input type="hidden" name="dni_cliente" id="input-dni">
                <input type="hidden" name="nombre_cliente" id="input-nombre">
                <input type="hidden" name="monto" id="input-precio">
                <input type="hidden" name="monto_financiado" id="input-financiado">
                <input type="hidden" name="estatus" id="input-estatus" value="activo">
                <input type="hidden" name="ip_origen" id="input-ip">

                <div class="form-group">
                    <label for="cuotas" class="font-weight-bold">Seleccione número de cuotas:</label>
                    <select name="cuotas" id="input-cuotas" class="form-control" required>
                        <option value="">-- Seleccione --</option>
                        <option value="3">3 meses</option>
                        <option value="6">6 meses</option>
                        <option value="9">9 meses</option>
                        <option value="12">12 meses</option>
                        <option value="18">18 meses</option>
                        <option value="24">24 meses</option>
                        <option value="36">36 meses</option>
                        <option value="48">48 meses</option>
                        <option value="60">60 meses</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="direccion" class="font-weight-bold">Seleccione una dirección:</label>
                    <select name="direccion" id="input-direccion" class="form-control" required>
                        <option value="">-- Seleccione --</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Información</button>
            </div>
        </div>
    </form>
  </div>
</div>



<div class="container-fluid">
    <!-- Tarjeta de ingreso de DNI -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-id-card"></i> Simulador de Crédito</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="dni" class="font-weight-bold">DNI del Cliente</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control text-center" id="dni"
                        placeholder="Ej: 12345678" maxlength="8">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" onclick="consultarCliente()">Consultar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="loader" class="text-center my-3" style="display: none;">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Cargando...</span>
        </div>
        <p class="text-muted mt-2">Consultando cliente...</p>
    </div>

    <!-- Resultados -->
    <div class="row" id="simulador-container" style="display: none;">
        <!-- Detalles del financiamiento -->
        <div class="col-md-5 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-chart-bar"></i> Detalles de Financiamiento</h3>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div id="detalle-cliente" class="text-muted mb-2">Cliente: ---<br>DNI: ---</div>
                        <div id="detalle-producto" class="font-weight-bold mb-2">Línea Aprobada: ---</div>
                        <div id="producto-seleccionado" class="font-weight-bold mb-2">Producto seleccionado: ---</div>
                        <table class="table table-sm table-hover text-center align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th>Plazo</th>
                                    <th>Cuota</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-cuotas"></tbody>
                        </table>
                    </div>
                    <button class="btn btn-success mt-3" onclick="mostrarFormulario()">
                        <i class="fas fa-arrow-right"></i> Continuar Proceso
                    </button>
                </div>
            </div>
        </div>

        <!-- Lista de celulares -->
        <div class="col-md-7 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-mobile-alt"></i> Equipos Disponibles</h3>
                </div>
                <div class="card-body">
                    <table id="tabla-productos" class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Producto</th>
                                <th>Precio Al Contado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

let tienda_id= {{ $tienda_id }};
let tablaProductos;
let clienteSeleccionado = null;
let productoSeleccionado = null;
let margen = 1.3

$(document).ready(function () {
    // Inicializar DataTable
    tablaProductos = $('#tabla-productos').DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: false,
        columns: [
            { data: 'nombre' },
            { data: 'precio' },
            { data: 'accion' },
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json"
        },
    });
});

function consultarCliente() {
    const dni = document.getElementById('dni').value.trim();

    if (!dni || dni.length !== 8) {
        alert('Ingrese un DNI válido de 8 dígitos.');
        return;
    }

    // Mostrar loader y ocultar contenedor
    document.getElementById('loader').style.display = 'block';
    document.getElementById('simulador-container').style.display = 'none';

    const baseUrl = "{{ url('/api/calidda/linea-credito') }}";
    const url = `${baseUrl}?numeroDocumento=${dni}&tipoDocumento=PE2`;

    fetch(url)
        .then(response => response.json())
        .then(res => {
            document.getElementById('loader').style.display = 'none';

            if (!res.valid || !res.data || !res.data.tieneLineaCredito) {
                alert('Cliente no encontrado o sin línea de crédito disponible.');
                return;
            }

            const cliente = res.data;

            const direcciones = (cliente.cuentasContrato || [])
                .map(c => c.direccion)
                .filter(d => d);

            clienteSeleccionado = {
                dni: cliente.numeroDocumento,
                nombre: cliente.nombre,
                linea_aprobada: parseFloat(cliente.lineaCredito),
                direcciones: direcciones
            };

            // Mostrar información del cliente
            document.getElementById('detalle-cliente').innerHTML = `
                Cliente: ${clienteSeleccionado.nombre}<br>DNI: ${clienteSeleccionado.dni}
            `;
            document.getElementById('detalle-producto').innerText =
                `Línea Aprobada: S/ ${clienteSeleccionado.linea_aprobada.toFixed(2)}`;

            // Mostrar productos y cuotas
            actualizarProductos(clienteSeleccionado.linea_aprobada);
            actualizarCuotas(0);

            document.getElementById('simulador-container').style.display = 'flex';
        })
        .catch(error => {
            console.error('Error al consultar API:', error);
            document.getElementById('loader').style.display = 'none';
            alert('Ocurrió un error al consultar la línea de crédito.');
        });
}

function actualizarCuotas(monto) {
    const plazos = [3, 6, 9, 12, 18, 24, 36, 48, 60];
    const tasaMensual = 0.0259548346585463; // 2.6% mensual
    const tasaSeguro = 0.15; // 0.15%

    const cuotas = plazos.map(cuotas => {
        const totalFinanciado = calcularTotalFinanciado(monto*margen, tasaSeguro, cuotas, true);
        const cuota = calcularCuotaTotal(totalFinanciado, tasaMensual, cuotas, tasaSeguro, true, true);
        return {
            plazo: `${cuotas} meses`,
            cuota: cuota.toFixed(2)
        };
    });

    const tbody = document.getElementById('tabla-cuotas');
    tbody.innerHTML = cuotas.map(c =>
        `<tr><td>${c.plazo}</td><td>S/ ${c.cuota}</td></tr>`
    ).join('');
}



function actualizarProductos(linea) {

    fetch(`/api/tiendas/${tienda_id}/productos`)
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Error al obtener productos.');
                return;
            }

            const disponibles = data.productos.filter(p => parseFloat(p.precio) <= linea);

            tablaProductos.clear();

            disponibles.forEach(p => {
                tablaProductos.row.add({
                    nombre: p.nombre,
                    precio: `S/ ${parseFloat(p.precio).toFixed(2)}`,
                    accion: `<button class="btn btn-outline-primary btn-sm" onclick="seleccionarProducto(${p.id}, '${p.nombre}', ${parseFloat(p.precio)})">
                                Seleccionar
                             </button>`
                });
            });

            tablaProductos.draw();
        })
        .catch(error => {
            console.error('Error al cargar productos:', error);
            alert('Ocurrió un error al cargar los productos.');
        });
}


function seleccionarProducto(id, nombre, precio) {
    // Actualizar cuotas en base al precio del celular
    actualizarCuotas(precio);

    // Actualizar visualmente el producto seleccionado (opcional)
    document.getElementById('producto-seleccionado').innerText =
        `Producto seleccionado: ${nombre} - Precio: S/ ${precio.toFixed(2)}`;

    productoSeleccionado = { id, nombre, precio };
}


async function mostrarFormulario() {
    if (!clienteSeleccionado || !productoSeleccionado) {
        alert('Debe seleccionar un cliente y un producto antes de continuar.');
        return;
    }
    const ip = await obtenerIP();

    // Setear valores en inputs ocultos
    document.getElementById('input-dni').value = clienteSeleccionado.dni;
    document.getElementById('input-nombre').value = clienteSeleccionado.nombre;
    document.getElementById('input-producto').value = productoSeleccionado.id;
    document.getElementById('input-precio').value = productoSeleccionado.precio;
    document.getElementById('input-financiado').value = productoSeleccionado.precio*margen;
    document.getElementById('input-ip').value = ip;

    const selectDireccion = document.getElementById('input-direccion');
    selectDireccion.innerHTML = '<option value="">-- Seleccione --</option>'; // limpiar
    clienteSeleccionado.direcciones.forEach(dir => {
        const opt = document.createElement('option');
        opt.value = dir;
        opt.textContent = dir;
        selectDireccion.appendChild(opt);
    });


    // Mostrar modal
    $('#modalGuardarProceso').modal('show');
}

async function obtenerIP() {
    try {
        const res = await fetch('https://api.ipify.org?format=json');
        const data = await res.json();
        return data.ip;
    } catch (error) {
        return 'IP no disponible';
    }
}


function redondear2Decimales(valor) {
    return Math.round(valor * 100) / 100;
}

function calcularSeguroTotal(monto, tasaSeguro, cuotas) {
    return monto * (tasaSeguro / 100) * cuotas;
}

function calcularSeguroMensual(monto, tasaSeguro, cuotas) {
    return calcularSeguroTotal(monto, tasaSeguro, cuotas) / cuotas;
}

function calcularCuotaBase(monto, tasaMensual, cuotas) {
    if (tasaMensual === 0) return monto / cuotas;
    const factor = Math.pow(1 + tasaMensual, cuotas);
    return monto * tasaMensual * factor / (factor - 1);
}

function calcularIGVInteres(monto, tasaMensual, igv = 0.18) {
    return monto * tasaMensual * igv;
}

function calcularCuotaTotal(monto, tasaMensual, cuotas, tasaSeguro = 0, incluirSeguro = false, incluirIGV = true) {
    const cuotaBase = calcularCuotaBase(monto, tasaMensual, cuotas);
    const igv = incluirIGV ? calcularIGVInteres(monto, tasaMensual) : 0;
    const seguro = incluirSeguro ? calcularSeguroMensual(monto, tasaSeguro, cuotas) : 0;
    return redondear2Decimales(cuotaBase + igv + seguro);
}

function calcularTotalFinanciado(monto, tasaSeguro = 0, cuotas = 0, incluirSeguro = false) {
    const seguroTotal = incluirSeguro ? calcularSeguroTotal(monto, tasaSeguro, cuotas) : 0;
    return redondear2Decimales(monto + seguroTotal);
}


</script>
@endpush
