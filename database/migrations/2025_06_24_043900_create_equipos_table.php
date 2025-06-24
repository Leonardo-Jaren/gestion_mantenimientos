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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('tipo_equipo_id')->constrained()->onDelete('cascade');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('ubicacion')->nullable();
            $table->date('fecha_instalacion')->nullable();
            $table->string('estado')->default('Operativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
