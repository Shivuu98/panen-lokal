<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Komoditas Tani Lokal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .bg-gradient-custom {
            background: linear-gradient(135deg, #065f46 0%, #047857 25%, #059669 50%, #10b981 75%, #34d399 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #10b981, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hover-scale {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-scale:hover {
            transform: translateY(-4px) scale(1.02);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(1.2);
                opacity: 0;
            }
        }

        .scroll-smooth {
            scroll-behavior: smooth;
        }

        .nav-blur {
            backdrop-filter: blur(20px);
            background: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="relative min-h-screen scroll-smooth overflow-x-hidden">
    <!-- Dynamic Background with Parallax Effect -->
    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-emerald-800/80 to-teal-700/70"></div>
        <div class="absolute inset-0" style="background-image: url('https://ketahananpangan.semarangkota.go.id/v3/content/images/Padi.jpg'); background-size: cover; background-position: center; background-attachment: fixed; filter: brightness(0.6) contrast(1.1);"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/30"></div>
    </div>

    <!-- Floating Particles -->
    <div class="fixed inset-0 z-1 pointer-events-none">
        <div class="absolute top-20 left-20 w-2 h-2 bg-green-400/30 rounded-full floating-animation"></div>
        <div class="absolute top-40 right-32 w-3 h-3 bg-emerald-300/20 rounded-full floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-40 left-1/4 w-1 h-1 bg-teal-400/40 rounded-full floating-animation" style="animation-delay: -4s;"></div>
        <div class="absolute top-1/3 right-20 w-2 h-2 bg-green-300/25 rounded-full floating-animation" style="animation-delay: -3s;"></div>
    </div>

    <!-- Modern Header with Glass Effect -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" id="header">
        <div class="nav-blur mx-4 mt-4 rounded-2xl shadow-2xl border border-white/10">
            <div class="container mx-auto px-8 py-4">
                <div class="flex justify-between items-center">
                    <!-- Logo Section -->
                    <div class="flex items-center space-x-4 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-green-400 rounded-full pulse-ring opacity-30"></div>
                            <div class="w-12 h-12 bg-gradient-custom rounded-full flex items-center justify-center shadow-xl">
                                <span class="text-white font-bold text-xl">🌾</span>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">Panen<span class="text-gradient">Lokal</span></h1>
                            <p class="text-green-200 text-xs">Komoditas Tani Indonesia</p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="{{ url('/') }}" class="group relative px-4 py-2 text-white font-medium hover:text-green-300 transition-all duration-300">
                            <span class="relative z-10">Beranda</span>
                            <div class="absolute inset-0 bg-gradient-custom rounded-lg opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-green-400 to-emerald-300 transition-all duration-300 group-hover:w-full"></div>
                        </a>
                        <a href="{{ url('/komoditas') }}" class="group relative px-4 py-2 text-white font-medium hover:text-green-300 transition-all duration-300">
                            <span class="relative z-10">Komoditas</span>
                            <div class="absolute inset-0 bg-gradient-custom rounded-lg opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-green-400 to-emerald-300 transition-all duration-300 group-hover:w-full"></div>
                        </a>
                         <a href="{{ url('/artikel') }}" class="group relative px-4 py-2 text-white font-medium hover:text-green-300 transition-all duration-300">
                            <span class="relative z-10">Artikel</span>
                            <div class="absolute inset-0 bg-gradient-custom rounded-lg opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-green-400 to-emerald-300 transition-all duration-300 group-hover:w-full"></div>
                        </a>
                        @auth
                            <div class="relative group">
                                <a href="#"
                                   class="relative group px-6 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover-scale shadow-lg hover:shadow-green-500/25 overflow-hidden flex items-center">
                                    <span class="relative z-10">{{ Auth::user()->name }}</span>
                                    <div class="absolute inset-0 bg-gradient-custom rounded-lg opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                    <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-green-400 to-emerald-300 transition-all duration-300 group-hover:w-full"></div>
                                    <svg class="ml-2 w-4 h-4 text-white opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </a>
                                <!-- Dropdown -->
                                <div class="absolute right-0 mt-2 w-48 bg-white rounded shadow-lg opacity-0 group-hover:opacity-100 transition pointer-events-auto z-50">
                                    @if(Auth::user()->role === 'admin')
                                        <a href="{{ url('/admin') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard Admin</a>
                                    @endif
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ url('/login') }}"
                               class="relative group px-6 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl hover-scale shadow-lg hover:shadow-green-500/25 overflow-hidden">
                                <span class="relative z-10">Login</span>
                                <div class="absolute inset-0 bg-gradient-custom rounded-lg opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-green-400 to-emerald-300 transition-all duration-300 group-hover:w-full"></div>
                            </a>
                        @endauth

                    </nav>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden mx-4 mt-2 glass-effect rounded-xl shadow-xl border border-white/10 transform -translate-y-4 opacity-0 transition-all duration-300 pointer-events-none">
            <div class="p-6 space-y-4">
                <a href="{{ url('/') }}" class="block text-white font-medium hover:text-green-300 transition-colors">Beranda</a>
                <a href="{{ url('/komoditas') }}" class="block text-white font-medium hover:text-green-300 transition-colors">Komoditas</a>
                <a href="{{ url('/login') }}" class="block bg-gradient-custom text-white font-semibold py-3 px-6 rounded-xl text-center hover-scale">Login</a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="relative z-10 pt-32">
        @yield('content')
    </main>

    <!-- Modern Footer -->
    <footer class="relative z-10 mt-20">
        <div class="glass-effect mx-4 mb-4 rounded-2xl border border-white/10">
            <div class="container mx-auto px-8 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-custom rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">🌾</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold">© {{ date('Y') }} Panen<span class="text-gradient">Lokal</span></p>
                            <p class="text-green-200 text-sm">Semua hak dilindungi undang-undang</p>
                        </div>
                    </div>

                    <div class="flex space-x-6">
                        <a href="#" class="text-green-200 hover:text-white transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="text-green-200 hover:text-white transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="text-green-200 hover:text-white transition-colors">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const isHidden = menu.classList.contains('pointer-events-none');

            if (isHidden) {
                menu.classList.remove('pointer-events-none', 'opacity-0', '-translate-y-4');
                menu.classList.add('pointer-events-auto', 'opacity-100', 'translate-y-0');
            } else {
                menu.classList.add('pointer-events-none', 'opacity-0', '-translate-y-4');
                menu.classList.remove('pointer-events-auto', 'opacity-100', 'translate-y-0');
            }
        }

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('backdrop-blur-lg');
            } else {
                header.classList.remove('backdrop-blur-lg');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation on page load
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>
