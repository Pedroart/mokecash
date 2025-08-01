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
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tienda_id')->constrained('tiendas');
            $table->foreignId('vendedor_id')->constrained('users');
            $table->foreignId('producto_id')->constrained();

            $table->string('dni_cliente');
            $table->string('nombre_cliente');
            $table->string('direccion');

            $table->unsignedInteger('cuotas');
            $table->decimal('monto', 10, 2);
            $table->decimal('monto_financiado', 10, 2);

            $table->enum('estatus', ['activo', 'finalizado', 'observado', 'anulado'])->default('activo');
            $table->ipAddress('ip_origen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacions');
    }
};
