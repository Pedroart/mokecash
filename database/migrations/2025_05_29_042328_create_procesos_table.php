<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cotizacion_id')->nullable()->constrained('cotizaciones')->nullOnDelete();
            $table->foreignId('tienda_id')->constrained('tiendas');
            $table->foreignId('vendedor_id')->constrained('users');

            $table->string('producto');
            $table->string('dni_cliente');
            $table->string('nombre_cliente');
            $table->string('telefono_cliente')->nullable();
            $table->string('correo_cliente')->nullable();

            $table->decimal('monto_solicitado', 12, 2);
            $table->decimal('tasa_interes', 5, 2)->default(0.00);
            $table->decimal('monto_acreditado', 12, 2)->nullable();
            $table->integer('numero_cuotas')->nullable();

            $table->string('estado')->default('iniciado');

            $table->timestamp('fecha_limite_firma')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procesos');
    }
}
