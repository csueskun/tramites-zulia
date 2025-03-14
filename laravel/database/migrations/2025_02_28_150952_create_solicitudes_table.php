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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('estado')->default('EN REVISION');
            $table->enum('asunto', [
                'TPVA', 'LLGVA', 'CLTVA', 'DPVA', 'RLC'
            ])->default('TPVA');
            $table->timestamp('fecha_aprobacion')->nullable();
            $table->timestamp('fecha_validacion')->nullable();
            $table->text('radicado');
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
