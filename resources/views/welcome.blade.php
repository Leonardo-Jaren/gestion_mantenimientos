<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetMaintain Pro - Sistema de Gestión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'bounce-gentle': 'bounceGentle 2s infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        bounceGentle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800">
    <div class="min-h-full">

        <!-- Main Header -->
        <header class="relative bg-white/10 backdrop-blur-md border-b border-white/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                            </svg>
                        </div>
                        <h1 class="text-xl font-bold text-white">NetMaintain Pro</h1>
                    </div>
                    <nav class="hidden md:flex space-x-8">
                        <!-- Guest User -->
                 
                        <a href="/login" class="inline-block px-5 py-1.5 text-white/90 border border-transparent hover:border-white/20 rounded-sm text-sm leading-normal transition-all duration-200">
                            Iniciar Sesión
                        </a>
                        <a href="/register" class="inline-block px-5 py-1.5 text-white/90 border border-white/20 hover:border-white/40 rounded-sm text-sm leading-normal transition-all duration-200">
                            Registrarse
                        </a>
                    </nav>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Welcome Section -->
            <div class="text-center mb-16 animate-fade-in">
                <div class="flex justify-center mb-8">
                    <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center animate-pulse-slow">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Bienvenido a
                    <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                        NetMaintain Pro
                    </span>
                </h2>
                <p class="text-xl text-white/80 max-w-3xl mx-auto leading-relaxed">
                    Tu plataforma integral para la gestión y mantenimiento de equipos de redes. 
                    Controla, supervisa y optimiza tu infraestructura de red con herramientas avanzadas.
                </p>
            </div>

            <!-- Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Gestión de Equipos -->
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 animate-slide-up">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Gestión de Equipos</h3>
                    <p class="text-white/70">Inventario completo de equipos de red con seguimiento de estado, ubicación y especificaciones técnicas.</p>
                </div>

                <!-- Mantenimiento Preventivo -->
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Mantenimiento Preventivo</h3>
                    <p class="text-white/70">Programa y ejecuta mantenimientos preventivos para maximizar la vida útil de tus equipos.</p>
                </div>

                <!-- Monitoreo en Tiempo Real -->
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300 animate-slide-up" style="animation-delay: 0.4s;">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-4">Monitoreo en Tiempo Real</h3>
                    <p class="text-white/70">Supervisa el rendimiento y estado de tu red con dashboards interactivos y alertas inteligentes.</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Agregar interactividad adicional
        document.addEventListener('DOMContentLoaded', function() {
            // Efecto de hover en las cards
            const cards = document.querySelectorAll('.bg-white\\/10');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Animación de números en las estadísticas
            const stats = document.querySelectorAll('.text-3xl');
            const animateNumbers = (element, target) => {
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current) + (target === 150 ? '+' : target === 99.9 ? '%' : target === 30 ? '%' : '');
                }, 30);
            };

            // Observador para activar animaciones cuando sean visibles
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const text = entry.target.textContent;
                        if (text.includes('150')) animateNumbers(entry.target, 150);
                        else if (text.includes('99.9')) animateNumbers(entry.target, 99.9);
                        else if (text.includes('24/7')) entry.target.textContent = '24/7';
                        else if (text.includes('30')) animateNumbers(entry.target, 30);
                    }
                });
            });

            stats.forEach(stat => observer.observe(stat));
        });
    </script>
</body>
</html>