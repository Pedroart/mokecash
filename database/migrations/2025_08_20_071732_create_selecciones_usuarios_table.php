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
        Schema::create('selecciones_usuarios', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('tienda_id')->constrained('tiendas');
            $table->foreignId('vendedor_id')->constrained('users');

            $table->string('dni_cliente');
            $table->string('nombre_cliente');
            $table->decimal('linea_credito', 10, 2);

            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->decimal('precio', 10, 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selecciones_usuarios');
    }
};
