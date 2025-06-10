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
        Schema::create('calida_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calida_credential_id')->constrained()->onDelete('cascade');
            $table->text('auth_token');
            $table->string('aliado_id');
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calida_tokens');
    }
};
