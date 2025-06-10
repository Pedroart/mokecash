<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            
            // Información del Encabezado de la Boleta
            $table->string('serie', 4); // Por ejemplo, B001
            $table->integer('numero'); // Por ejemplo, 123
            $table->string('numero_boleta_completo', 20)->unique(); // B001-123, para fácil referencia y unicidad
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable(); // Nuevo campo de la API
            $table->string('moneda', 3)->default('PEN'); // PEN, USD, etc.
            $table->string('tipo_operacion', 4); // Código interno de la API/SUNAT, ej. 0101

            $table->string('cajero', 100)->nullable(); // Vendedor
            $table->string('empresa_nombre', 255); // Moke SAC
            $table->string('empresa_ruc', 11); // 2020606031 (RUC tiene 11 dígitos en Perú)
            $table->string('empresa_direccion', 255)->nullable(); // Tienda.Direccion

            // Información del Cliente
            $table->string('cliente_tipo_documento', 1); // 1 = DNI, 6 = RUC
            $table->string('cliente_numero_documento', 11)->nullable(); // DNI 8 dígitos, RUC 11 dígitos
            $table->string('cliente_denominacion', 255); // Nombre completo del cliente
            $table->string('cliente_direccion', 255)->nullable(); // Dirección del cliente

            // Montos y Totales
            $table->decimal('total_gravada', 10, 2); // Subtotal antes de IGV (valor_venta en API)
            $table->decimal('total_igv', 10, 2); // Monto calculado de IGV (18%)
            $table->decimal('importe_total', 10, 2); // Gran total (Gravada + IGV)
            $table->string('importe_letras', 500)->nullable(); // SON: escrito lo pagado

            // Información de Pago
            $table->string('metodo_pago', 50)->nullable(); // Efectivo, Tarjeta, Yape, Plin, etc.
            $table->decimal('monto_pagado', 10, 2)->nullable(); // Monto recibido del cliente
            $table->decimal('cambio', 10, 2)->nullable(); // Vuelto a entregar

            // Información Legal/Comprobante Electrónico (respuesta de la API)
            $table->string('api_hash', 100)->nullable(); // 'hash' de la respuesta API (código de autenticación)
            $table->string('xml_url', 255)->nullable(); // URL del XML del comprobante
            $table->string('cdr_url', 255)->nullable(); // URL del CDR (Constancia de Recepción de SUNAT)
            $table->string('qr_code_path', 255)->nullable(); // Ruta donde se guardaría el QR generado localmente (si aplica)
            $table->string('sunat_resolucion', 50)->nullable(); // Número de Resolución SUNAT (si aplica)


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletas');
    }
};
