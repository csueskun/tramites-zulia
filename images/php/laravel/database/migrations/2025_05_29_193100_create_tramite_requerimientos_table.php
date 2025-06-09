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
        Schema::create('tramite_requerimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tramite_id')->constrained('tramites')->onDelete('cascade');
            $table->longText('descripcion');
            $table->boolean('obligatorio')->default(true);
            $table->enum('tipo', ['ARCHIVO', 'MENCION'])->default('MENCION');
            $table->enum('vehiculo', config('enums.vehiculo_types'))->default('TODOS');
            $table->enum('persona', config('enums.persona_types'))->default('TODOS');
            $table->json('file_metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramite_requerimientos');
    }
};
