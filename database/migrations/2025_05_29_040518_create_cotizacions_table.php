<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('tienda_id')->constrained('tiendas');
            $table->foreignId('vendedor_id')->constrained('users');

            $table->string('dni_cliente');
            $table->decimal('monto_solicitado', 12, 2);

            $table->ipAddress('ip_origen')->nullable();
            
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
        Schema::dropIfExists('cotizacions');
    }
}
