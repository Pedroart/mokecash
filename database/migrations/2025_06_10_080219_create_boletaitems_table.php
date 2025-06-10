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
        Schema::create('boletaitems', function (Blueprint $table) {
            $table->id();

            $table->foreignId('boleta_id')->constrained('boletas')->onDelete('cascade'); // Enlace a la boleta
            
            $table->string('sku', 50)->nullable();
            $table->string('descripcion', 255);
            $table->string('unidad_de_medida', 3)->nullable(); // NIU, UND, etc. (de la API)
            $table->integer('cantidad');
            $table->decimal('valor_unitario', 10, 2); // Precio antes de IGV (valor_unitario de la API)
            $table->decimal('precio_unitario_con_igv', 10, 2)->nullable(); // Precio incluyendo IGV (precio_unitario de la API)
            $table->string('codigo_tipo_afectacion_igv', 2)->default('10'); // Código de afectación IGV (de la API)
            $table->decimal('porcentaje_igv', 5, 2)->default(18.00); // Porcentaje IGV (de la API)
            $table->decimal('descuento_item', 10, 2)->default(0.00); // Descuento por ítem (de la API)
            $table->decimal('total_item', 10, 2); // Cantidad * Precio Unitario para este ítem

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletaitems');
    }
};
