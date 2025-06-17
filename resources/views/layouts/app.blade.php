<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Komoditas Tani Lokal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Menggunakan Vite --}}
</head>
<body class="relative min-h-screen scroll-smooth overflow-x-hidden">

    <!-- Dynamic Background -->
    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-emerald-800/80 to-teal-700/70"></div>
        <div class="absolute inset-0 bg-cover bg-center bg-fixed brightness-[.6] contrast-[1.1]" style="background-image: url('https://ketahananpangan.semarangkota.go.id/v3/content/images/Padi.jpg');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-black/30"></div>
    </div>

    <!-- Floating Particles -->
    <div class="fixed inset-0 z-1 pointer-events-none">
        <div class="absolute top-20 left-20 w-2 h-2 bg-green-400/30 rounded-full floating-animation"></div>
        <div class="absolute top-40 right-32 w-3 h-3 bg-emerald-300/20 rounded-full floating-animation" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-40 left-1/4 w-1 h-1 bg-teal-400/40 rounded-full floating-animation" style="animation-delay: -4s;"></div>
        <div class="absolute top-1/3 right-20 w-2 h-2 bg-green-300/25 rounded-full floating-animation" style="animation-delay: -3s;"></div>
    </div>

    {{-- Include Navbar --}}
    @include('components.navbar')

    <!-- Content -->
    <main class="relative z-10 pt-32">
        @yield('content')
    </main>

    {{-- Include Footer --}}
    @include('components.footer')

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

    @stack('scripts')

</body>
</html>
