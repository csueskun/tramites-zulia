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
        Schema::create('tramite_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tramite_id')->constrained('tramites')->onDelete('cascade');
            $table->string('nombre');
            $table->longText('descripcion');
            $table->enum('tipo', ['COSTO', 'ESTAMPILLA'])->default('COSTO');
            $table->enum('vehiculo', config('enums.vehiculo_types'))->default('TODOS');
            $table->enum('persona', config('enums.persona_types'))->default('TODOS');
            $table->decimal('precio', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramite_items');
    }
};
