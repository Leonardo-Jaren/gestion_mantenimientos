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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained()->onDelete('cascade');
            $table->foreignId('tecnico_id')->nullable()->constrained()->onDelete('set null');
            $table->text('descripcion');
            $table->enum('prioridad', ['Alta', 'Media', 'Baja'])->default('Media');
            $table->enum('estado', ['Abierta', 'En revisión', 'Resuelta'])->default('Abierta');
            $table->date('fecha_reporte');
            $table->date('fecha_solucion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
