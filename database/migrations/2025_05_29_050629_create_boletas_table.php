<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proceso_id'); // proceso_id
            $table->string('serie', 10); // serie
            $table->integer('numero'); // número
            $table->decimal('monto_total', 10, 2); // monto_total
            $table->json('json_data'); // json completo
            $table->date('fecha_emision'); // fecha_emision
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
        Schema::dropIfExists('boletas');
    }
}
