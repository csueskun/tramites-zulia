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
            $table->unsignedBigInteger('tramite_id');
            $table->foreign('tramite_id')->references('id')->on('tramites')->onDelete('cascade');
            $table->string('nombres');
            $table->string('tipo_documento');
            $table->string('identificacion');
            $table->string(column: 'email');
            $table->string('estado')->default('EN REVISION');
            $table->timestamp('fecha_aprobacion')->nullable();
            $table->timestamp('fecha_validacion')->nullable();
            $table->text('radicado');
            $table->string('link_pago')->nullable();
            $table->enum('vehiculo', config('enums.vehiculo_types'))->nullable();
            $table->enum('persona', config('enums.persona_types'))->nullable();
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
