<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Ruta principal (página de bienvenida o login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Ruta de login personalizada (si usas el componente Login)
Route::get('/login', function () {
    return view('login'); // Vista que contiene tu componente Login
})->name('login');

// Dashboard principal - requiere autenticación
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas del sistema de mantenimiento - requieren autenticación
Route::middleware(['auth'])->group(function () {
    // Módulo de Equipos
    Route::get('/equipos', \App\Livewire\Equipos\Index::class)->name('equipos.index');
    Route::get('/equipos/crear', \App\Livewire\Equipos\Crear::class)->name('equipos.crear');
    Route::get('/equipos/{id}', \App\Livewire\Equipos\Show::class)->name('equipos.show');
    Route::get('/equipos/{id}/editar', \App\Livewire\Equipos\Editar::class)->name('equipos.editar');

    // Módulo de Mantenimientos
    Route::get('/mantenimientos', \App\Livewire\Mantenimientos\Index::class)->name('mantenimientos.index');
    Route::get('/mantenimientos/crear', \App\Livewire\Mantenimientos\Crear::class)->name('mantenimientos.crear');
    Route::get('/mantenimientos/{id}', \App\Livewire\Mantenimientos\Show::class)->name('mantenimientos.show');
    Route::get('/mantenimientos/{id}/editar', \App\Livewire\Mantenimientos\Editar::class)->name('mantenimientos.editar');

    // Módulo de Reportes
    Route::get('/reportes/generar', \App\Livewire\Reportes\Generar::class)->name('reportes.generar');
    Route::get('/reportes', \App\Livewire\Reportes\Index::class)->name('reportes.index');
    Route::get('/reportes/equipos', \App\Livewire\Reportes\Equipos::class)->name('reportes.equipos');
    Route::get('/reportes/mantenimientos', \App\Livewire\Reportes\Mantenimientos::class)->name('reportes.mantenimientos');

    // Configuración del sistema
    Route::redirect('configuracion', 'configuracion/general');
    Route::get('/configuracion/general', \App\Livewire\Configuracion\General::class)->name('configuracion.general');
    Route::get('/configuracion/notificaciones', \App\Livewire\Configuracion\Notificaciones::class)->name('configuracion.notificaciones');
    Route::get('/configuracion/respaldos', \App\Livewire\Configuracion\Respaldos::class)->name('configuracion.respaldos');

    // Configuración personal del usuario (usando Volt)
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// API Routes para AJAX (opcional)
Route::middleware(['auth'])->prefix('api')->group(function () {
    Route::get('/equipos/search', function () {
        // Lógica de búsqueda de equipos
    })->name('api.equipos.search');
    Route::get('/mantenimientos/stats', function () {
        // Estadísticas de mantenimientos
    })->name('api.mantenimientos.stats');
});

// Incluir rutas de autenticación
require __DIR__ . '/auth.php';
