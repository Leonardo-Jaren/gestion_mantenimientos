<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Gestión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #3b82f6 0%, #1d4ed8 100%);
            transition: width 0.6s ease-in-out;
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .floating-element {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen">
    <?php
    $stats = [
        'equipos_total' => 150,
        'equipos_operativos' => 120,
        'mantenimientos_pendientes' => 5,
        'incidencias_abiertas' => 3,
        'mantenimientos_hoy' => 2,
        'tecnicos_activos' => 4,
        'equipos_mantenimiento' => 10,
        'equipos_fuera_servicio' => 2
    ];
    $equiposPorTipo = [
        ['nombre' => 'Computadoras', 'cantidad' => 50, 'color' => 'blue'],
        ['nombre' => 'Impresoras', 'cantidad' => 30, 'color' => 'green'],
        ['nombre' => 'Servidores', 'cantidad' => 20, 'color' => 'purple'],
        ['nombre' => 'Redes', 'cantidad' => 10, 'color' => 'orange'],
        ['nombre' => 'Otros', 'cantidad' => 40, 'color' => 'pink']
    ];
    $incidenciasPorPrioridad = [
        ['prioridad' => 'Alta', 'total' => 1, 'color' => 'red'],
        ['prioridad' => 'Media', 'total' => 2, 'color' => 'yellow'],
        ['prioridad' => 'Baja', 'total' => 0, 'color' => 'green']
    ];
    $proximosMantenimientos = [
        ['equipo' => 'Computadora 1', 'tecnico' => 'Juan Pérez', 'tipo' => 'Preventivo', 'fecha' => '2023-10-15', 'dias_restantes' => 3],
        ['equipo' => 'Impresora 2', 'tecnico' => 'Ana Gómez', 'tipo' => 'Correctivo', 'fecha' => '2023-10-16', 'dias_restantes' => 4],
    ];
    ?>
    <div class="min-h-screen flex">
        <!-- Sidebar izquierdo -->
    <aside class="w-64 bg-white shadow-lg border-r border-gray-200">
        <x-navigation />
    </aside>
    <main class="flex-1 p-8">
        <!-- Header con efecto glass -->
        <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 p-8 mb-8">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between space-y-4 lg:space-y-0">
                <div class="space-y-2">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                        Dashboard
                    </h1>
                    <p class="text-gray-600 text-lg">Bienvenido, <span class="font-semibold text-indigo-600">Administrador</span></p>
                </div>
                <div class="flex flex-wrap items-center gap-4">
                    <button class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Actualizar
                    </button>
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-red-100 to-red-200 text-red-800 shadow-md">
                        <div class="w-2 h-2 bg-red-500 rounded-full mr-2 pulse-animation"></div>
                        Administrador
                    </span>
                    <span class="text-sm text-gray-500 bg-white/50 px-3 py-2 rounded-lg">
                        <?= date('d/m/Y H:i') ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- Stats Grid Principal con animaciones -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Equipos -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg floating-element">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Total Equipos</p>
                        <p class="text-3xl font-bold text-gray-900"><?= $stats['equipos_total'] ?></p>
                        <p class="text-xs text-emerald-600 mt-1 font-medium">✓ Inventario completo</p>
                    </div>
                </div>
            </div>

            <!-- Equipos Operativos -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg floating-element">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Equipos Operativos</p>
                        <p class="text-3xl font-bold text-gray-900"><?= $stats['equipos_operativos'] ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?= round(($stats['equipos_operativos'] / $stats['equipos_total']) * 100, 1) ?>% del total</p>
                    </div>
                </div>
            </div>

            <!-- Mantenimientos Pendientes -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center shadow-lg floating-element">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Mantenimientos Pendientes</p>
                        <p class="text-3xl font-bold text-gray-900"><?= $stats['mantenimientos_pendientes'] ?></p>
                        <p class="text-xs text-amber-600 mt-1 font-medium">⚠ Requieren atención</p>
                    </div>
                </div>
            </div>

            <!-- Incidencias Abiertas -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center shadow-lg floating-element">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.734-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Incidencias Abiertas</p>
                        <p class="text-3xl font-bold text-gray-900"><?= $stats['incidencias_abiertas'] ?></p>
                        <p class="text-xs text-red-600 mt-1 font-medium">🔥 Resolver pronto</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid Secundario -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Mantenimientos Hoy -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Mantenimientos Hoy</p>
                        <p class="text-2xl font-bold text-gray-900"><?= $stats['mantenimientos_hoy'] ?></p>
                        <p class="text-xs text-purple-600 mt-1">Programados</p>
                    </div>
                </div>
            </div>

            <!-- Técnicos Activos -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Técnicos Activos</p>
                        <p class="text-2xl font-bold text-gray-900"><?= $stats['tecnicos_activos'] ?></p>
                        <p class="text-xs text-indigo-600 mt-1">Disponibles</p>
                    </div>
                </div>
            </div>

            <!-- Equipos en Mantenimiento -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">En Mantenimiento</p>
                        <p class="text-2xl font-bold text-gray-900"><?= $stats['equipos_mantenimiento'] ?></p>
                        <p class="text-xs text-orange-600 mt-1">Equipos</p>
                    </div>
                </div>
            </div>

            <!-- Equipos Fuera de Servicio -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-6 card-hover">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-14 h-14 bg-gradient-to-br from-gray-400 to-gray-600 rounded-xl flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Fuera de Servicio</p>
                        <p class="text-2xl font-bold text-gray-900"><?= $stats['equipos_fuera_servicio'] ?></p>
                        <p class="text-xs text-gray-600 mt-1">Requieren reparación</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos y Datos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Equipos por Tipo -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg mr-3"></div>
                    Equipos por Tipo
                </h3>
                <div class="space-y-6">
                    <?php foreach($equiposPorTipo as $tipo): ?>
                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700"><?= $tipo['nombre'] ?></span>
                            <span class="text-sm font-bold text-gray-900 bg-gray-100 px-3 py-1 rounded-full"><?= $tipo['cantidad'] ?></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 shadow-inner">
                            <div class="progress-bar h-3 rounded-full shadow-sm" 
                                 style="width: <?= ($tipo['cantidad'] / $stats['equipos_total']) * 100 ?>%"></div>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            <?= round(($tipo['cantidad'] / $stats['equipos_total']) * 100, 1) ?>% del total
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Incidencias por Prioridad -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-pink-600 rounded-lg mr-3"></div>
                    Incidencias por Prioridad
                </h3>
                <div class="space-y-4">
                    <?php foreach($incidenciasPorPrioridad as $incidencia): ?>
                    <div class="flex items-center justify-between p-4 rounded-xl 
                        <?= $incidencia['prioridad'] === 'Alta' ? 'bg-red-50 border border-red-200' : 
                           ($incidencia['prioridad'] === 'Media' ? 'bg-yellow-50 border border-yellow-200' : 'bg-green-50 border border-green-200') ?>">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full mr-3 
                                <?= $incidencia['prioridad'] === 'Alta' ? 'bg-red-500' : 
                                   ($incidencia['prioridad'] === 'Media' ? 'bg-yellow-500' : 'bg-green-500') ?>"></div>
                            <span class="text-sm font-semibold text-gray-700"><?= $incidencia['prioridad'] ?></span>
                        </div>
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold
                            <?= $incidencia['prioridad'] === 'Alta' ? 'bg-red-500 text-white' : 
                               ($incidencia['prioridad'] === 'Media' ? 'bg-yellow-500 text-white' : 'bg-green-500 text-white') ?>">
                            <?= $incidencia['total'] ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Próximos Mantenimientos -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-white/20 p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <div class="w-8 h-8 bg-gradient-to-r from-amber-500 to-orange-600 rounded-lg mr-3"></div>
                    Próximos Mantenimientos
                </h3>
                <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">Próximos 7 días</span>
            </div>
            
            <?php if(count($proximosMantenimientos) > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach($proximosMantenimientos as $mantenimiento): ?>
                    <div class="border-l-4 border-amber-400 bg-amber-50 rounded-r-xl p-6 hover:bg-amber-100 transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div class="space-y-2">
                                <p class="text-lg font-semibold text-gray-900"><?= $mantenimiento['equipo'] ?></p>
                                <p class="text-sm text-gray-600">
                                    <span class="font-medium"><?= $mantenimiento['tecnico'] ?></span> • 
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                        <?= $mantenimiento['tipo'] ?>
                                    </span>
                                </p>
                            </div>
                            <div class="text-right space-y-1">
                                <p class="text-sm font-semibold text-gray-900"><?= $mantenimiento['fecha'] ?></p>
                                <p class="text-xs text-amber-600 bg-amber-200 px-2 py-1 rounded-full font-medium">
                                    <?= $mantenimiento['dias_restantes'] ?> días
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg">No hay mantenimientos programados en los próximos 7 días</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
    </div>
    <script>
        // Aquí puedes agregar scripts adicionales si es necesario
        document.addEventListener('DOMContentLoaded', function() {
            // Ejemplo de script para actualizar el dashboard cada 5 minutos
            setInterval(() => {
                location.reload();
            }, 300000); // 300000 ms = 5 minutos
        });
    </script>
