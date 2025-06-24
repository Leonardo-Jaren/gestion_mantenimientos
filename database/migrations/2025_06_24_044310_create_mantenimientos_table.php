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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained()->onDelete('cascade');
            $table->foreignId('tecnico_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('tipo', ['Preventivo', 'Correctivo', 'Predictivo']);
            $table->date('fecha_programada');
            $table->text('resultado')->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('estado', ['Pendiente', 'En progreso', 'Completado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
