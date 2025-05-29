<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoprocesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentoprocesos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proceso_id')->constrained('procesos')->onDelete('cascade');
            $table->foreignId('subido_por')->nullable()->constrained('users'); // quién lo subió

            $table->string('tipo'); // boleta, foto_dni, selfie, evidencia_extra, etc.
            $table->string('archivo'); // ruta en el storage o URL
            $table->text('descripcion')->nullable(); // observaciones si aplica

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
        Schema::dropIfExists('documentoprocesos');
    }
}
