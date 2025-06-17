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