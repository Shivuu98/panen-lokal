<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Panen Lokal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(40px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    },
                    colors: {
                        'harvest-green': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-effect {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.2);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 4s ease-in-out infinite;
        }

        .floating-elements::before {
            top: 20%;
            left: 10%;
            animation-delay: -2s;
        }

        .floating-elements::after {
            top: 60%;
            right: 15%;
            animation-delay: -3s;
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center relative py-4 px-4 sm:py-8"
      style="background-image: url('{{ asset('images/background-sawah.jpeg') }}');">

    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <div class="floating-elements"></div>

    <!-- Main Login Container -->
    <div class="relative z-10 w-full max-w-md px-4 sm:px-6">
        <!-- Logo Section -->
        <div class="text-center mb-6 sm:mb-8 animate-fade-in">
            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-harvest-green-500 rounded-full shadow-lg mb-3 sm:mb-4 animate-float">
                <i class="fas fa-seedling text-white text-xl sm:text-2xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">Panen Lokal</h1>
            <p class="text-green-100 text-xs sm:text-sm">Menghubungkan petani dengan konsumen</p>
        </div>

        <!-- Login Form Container -->
        <div class="glass-effect bg-white bg-opacity-10 p-6 sm:p-8 rounded-2xl shadow-2xl border border-white border-opacity-20 animate-slide-up">
            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-center text-white">
                <i class="fas fa-sign-in-alt mr-2 text-harvest-green-400"></i>
                Masuk ke Akun Anda
            </h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-500 bg-opacity-90 text-white p-4 rounded-lg mb-6 border-l-4 border-red-600 animate-fade-in">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            <form method="POST" action="/login" class="space-y-6">
                @csrf

                <!-- Email Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-green-100 ml-1">
                        <i class="fas fa-envelope mr-2"></i>
                        Email
                    </label>
                    <div class="relative">
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="w-full bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-green-200 p-3 sm:p-4 pl-10 sm:pl-12 rounded-xl focus:outline-none focus:ring-2 focus:ring-harvest-green-400 focus:border-transparent transition-all duration-300 input-focus glass-effect text-sm sm:text-base"
                               placeholder="Masukkan email Anda"
                               required>
                        <i class="fas fa-envelope absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-green-300 text-sm sm:text-base"></i>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-green-100 ml-1">
                        <i class="fas fa-lock mr-2"></i>
                        Password
                    </label>
                    <div class="relative">
                        <input type="password"
                               name="password"
                               id="password"
                               class="w-full bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-green-200 p-3 sm:p-4 pl-10 sm:pl-12 pr-10 sm:pr-12 rounded-xl focus:outline-none focus:ring-2 focus:ring-harvest-green-400 focus:border-transparent transition-all duration-300 input-focus glass-effect text-sm sm:text-base"
                               placeholder="Masukkan password Anda"
                               required>
                        <i class="fas fa-lock absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-green-300 text-sm sm:text-base"></i>
                        <button type="button"
                                onclick="togglePassword()"
                                class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 text-green-300 hover:text-white transition-colors duration-200">
                            <i class="fas fa-eye text-sm sm:text-base" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-green-100 cursor-pointer hover:text-white transition-colors duration-200">
                        <input type="checkbox" name="remember" class="mr-2 rounded border-green-300 text-harvest-green-500 focus:ring-harvest-green-400">
                        <span>Ingat saya</span>
                    </label>
                </div>

                <!-- Login Button -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-harvest-green-500 to-harvest-green-600 text-white py-3 sm:py-4 rounded-xl font-semibold text-base sm:text-lg shadow-lg hover:from-harvest-green-600 hover:to-harvest-green-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-harvest-green-400 focus:ring-offset-2 focus:ring-offset-transparent">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk Sekarang
                </button>
            </form>



            <!-- Register Link -->
            <div class="text-center mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-white border-opacity-20">
                <p class="text-green-100 text-sm">
                    Belum punya akun?
                    <a href="/register" class="text-harvest-green-300 font-semibold hover:text-white transition-colors duration-200 hover:underline ml-1">
                        <i class="fas fa-user-plus mr-1"></i>
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 sm:mt-8 text-green-200 text-xs sm:text-sm animate-fade-in">
            <p>&copy; {{ date('Y') }} Panen Lokal. Semua hak dilindungi.</p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Add loading state to login button
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            button.disabled = true;
        });

        // Auto-hide error messages after 5 seconds
        setTimeout(() => {
            const errorDiv = document.querySelector('.bg-red-500');
            if (errorDiv) {
                errorDiv.style.opacity = '0';
                errorDiv.style.transform = 'translateY(-20px)';
                setTimeout(() => errorDiv.remove(), 300);
            }
        }, 5000);
    </script>
</body>
</html>
