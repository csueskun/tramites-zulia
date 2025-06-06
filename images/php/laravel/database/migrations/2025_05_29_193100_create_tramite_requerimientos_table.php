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
            $table->enum('vehiculo', config('enums.vehiculo_types'))->default(config('enums.vehiculo_types')[0]);
            $table->enum('persona', config('enums.persona_types'))->default(config('enums.persona_types')[0]);
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
