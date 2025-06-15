<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Panen Lokal</title>
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
                        'bounce-slow': 'bounce 2s infinite',
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
                            400: '#4ade80',
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
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: float 5s ease-in-out infinite;
        }

        .floating-elements::before {
            top: 15%;
            right: 10%;
            animation-delay: -1s;
        }

        .floating-elements::after {
            bottom: 20%;
            left: 15%;
            animation-delay: -3s;
            width: 60px;
            height: 60px;
        }

        .strength-meter {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-weak { background: #ef4444; width: 25%; }
        .strength-fair { background: #f59e0b; width: 50%; }
        .strength-good { background: #3b82f6; width: 75%; }
        .strength-strong { background: #10b981; width: 100%; }
    </style>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center relative py-4 px-4 sm:py-8"
      style="background-image: url('{{ asset('images/background-sawah.jpeg') }}');">

    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <!-- Floating Elements -->
    <div class="floating-elements"></div>

    <!-- Main Register Container -->
    <div class="relative z-10 w-full max-w-lg px-4 sm:px-6">
        <!-- Logo Section -->
        <div class="text-center mb-6 sm:mb-8 animate-fade-in">
            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-harvest-green-500 rounded-full shadow-lg mb-3 sm:mb-4 animate-float">
                <i class="fas fa-seedling text-white text-xl sm:text-2xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">Panen Lokal</h1>
            <p class="text-green-100 text-xs sm:text-sm">Bergabunglah dengan komunitas petani lokal</p>
        </div>

        <!-- Register Form Container -->
        <div class="glass-effect bg-white bg-opacity-10 p-6 sm:p-8 rounded-2xl shadow-2xl border border-white border-opacity-20 animate-slide-up">
            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-center text-white">
                <i class="fas fa-user-plus mr-2 text-harvest-green-400"></i>
                Buat Akun Baru
            </h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-500 bg-opacity-90 text-white p-4 rounded-lg mb-6 border-l-4 border-red-600 animate-fade-in">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span class="font-semibold">Terjadi kesalahan:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register" class="space-y-4 sm:space-y-5" id="registerForm">
                @csrf

                <!-- Name Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-green-100 ml-1">
                        <i class="fas fa-user mr-2"></i>
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="w-full bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-green-200 p-3 sm:p-4 pl-10 sm:pl-12 rounded-xl focus:outline-none focus:ring-2 focus:ring-harvest-green-400 focus:border-transparent transition-all duration-300 input-focus glass-effect text-sm sm:text-base"
                               placeholder="Masukkan nama lengkap Anda"
                               required>
                        <i class="fas fa-user absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-green-300 text-sm sm:text-base"></i>
                    </div>
                </div>

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
                               placeholder="contoh@email.com"
                               required>
                        <i class="fas fa-envelope absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-green-300 text-sm sm:text-base"></i>
                        <div class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2">
                            <i class="fas fa-check-circle text-green-400 hidden text-sm sm:text-base" id="emailValid"></i>
                            <i class="fas fa-times-circle text-red-400 hidden text-sm sm:text-base" id="emailInvalid"></i>
                        </div>
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
                               placeholder="Minimal 8 karakter"
                               required>
                        <i class="fas fa-lock absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-green-300 text-sm sm:text-base"></i>
                        <button type="button"
                                onclick="togglePassword('password', 'toggleIcon1')"
                                class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 text-green-300 hover:text-white transition-colors duration-200">
                            <i class="fas fa-eye text-sm sm:text-base" id="toggleIcon1"></i>
                        </button>
                    </div>
                    <!-- Password Strength Meter -->
                    <div class="mt-2">
                        <div class="bg-gray-300 bg-opacity-30 h-1 rounded-full">
                            <div class="strength-meter" id="strengthMeter"></div>
                        </div>
                        <p class="text-xs text-green-200 mt-1" id="strengthText">Kekuatan password</p>
                    </div>
                </div>

                <!-- Password Confirmation Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-green-100 ml-1">
                        <i class="fas fa-lock mr-2"></i>
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="w-full bg-white bg-opacity-20 border border-white border-opacity-30 text-white placeholder-green-200 p-3 sm:p-4 pl-10 sm:pl-12 pr-16 sm:pr-20 rounded-xl focus:outline-none focus:ring-2 focus:ring-harvest-green-400 focus:border-transparent transition-all duration-300 input-focus glass-effect text-sm sm:text-base"
                               placeholder="Ulangi password Anda"
                               required>
                        <i class="fas fa-lock absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-green-300 text-sm sm:text-base"></i>
                        <button type="button"
                                onclick="togglePassword('password_confirmation', 'toggleIcon2')"
                                class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 text-green-300 hover:text-white transition-colors duration-200">
                            <i class="fas fa-eye text-sm sm:text-base" id="toggleIcon2"></i>
                        </button>
                        <div class="absolute right-8 sm:right-12 top-1/2 transform -translate-y-1/2">
                            <i class="fas fa-check-circle text-green-400 hidden text-sm sm:text-base" id="passwordMatch"></i>
                            <i class="fas fa-times-circle text-red-400 hidden text-sm sm:text-base" id="passwordMismatch"></i>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start space-x-3 pt-2">
                    <input type="checkbox"
                           id="terms"
                           name="terms"
                           class="mt-1 rounded border-green-300 text-harvest-green-500 focus:ring-harvest-green-400 bg-transparent"
                           required>
                    <label for="terms" class="text-sm text-green-100 cursor-pointer">
                        Saya setuju dengan
                        <a href="#" class="text-harvest-green-300 hover:text-white underline">Syarat & Ketentuan</a>
                        dan
                        <a href="#" class="text-harvest-green-300 hover:text-white underline">Kebijakan Privasi</a>
                    </label>
                </div>

                <!-- Register Button -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-harvest-green-500 to-harvest-green-600 text-white py-3 sm:py-4 rounded-xl font-semibold text-base sm:text-lg shadow-lg hover:from-harvest-green-600 hover:to-harvest-green-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-harvest-green-400 focus:ring-offset-2 focus:ring-offset-transparent disabled:opacity-50 disabled:cursor-not-allowed"
                        id="submitBtn">
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar Sekarang
                </button>
            </form>



            <!-- Login Link -->
            <div class="text-center mt-6 pt-6 border-t border-white border-opacity-20">
                <p class="text-green-100">
                    Sudah punya akun?
                    <a href="/login" class="text-harvest-green-300 font-semibold hover:text-white transition-colors duration-200 hover:underline ml-1">
                        <i class="fas fa-sign-in-alt mr-1"></i>
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-green-200 text-sm animate-fade-in">
            <p>&copy; {{ date('Y') }} Panen Lokal. Semua hak dilindungi.</p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

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

        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            const strengthMeter = document.getElementById('strengthMeter');
            const strengthText = document.getElementById('strengthText');

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthMeter.className = 'strength-meter transition-all duration-300';

            switch(strength) {
                case 0:
                case 1:
                    strengthMeter.classList.add('strength-weak');
                    strengthText.textContent = 'Password lemah';
                    strengthText.className = 'text-xs text-red-300 mt-1';
                    break;
                case 2:
                    strengthMeter.classList.add('strength-fair');
                    strengthText.textContent = 'Password cukup';
                    strengthText.className = 'text-xs text-yellow-300 mt-1';
                    break;
                case 3:
                case 4:
                    strengthMeter.classList.add('strength-good');
                    strengthText.textContent = 'Password baik';
                    strengthText.className = 'text-xs text-blue-300 mt-1';
                    break;
                case 5:
                    strengthMeter.classList.add('strength-strong');
                    strengthText.textContent = 'Password kuat';
                    strengthText.className = 'text-xs text-green-300 mt-1';
                    break;
            }
        }

        // Email validation
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Password confirmation checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            const matchIcon = document.getElementById('passwordMatch');
            const mismatchIcon = document.getElementById('passwordMismatch');

            if (confirmation.length > 0) {
                if (password === confirmation) {
                    matchIcon.classList.remove('hidden');
                    mismatchIcon.classList.add('hidden');
                } else {
                    matchIcon.classList.add('hidden');
                    mismatchIcon.classList.remove('hidden');
                }
            } else {
                matchIcon.classList.add('hidden');
                mismatchIcon.classList.add('hidden');
            }
        }

        // Event listeners
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });

        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

        document.querySelector('input[name="email"]').addEventListener('input', function() {
            const validIcon = document.getElementById('emailValid');
            const invalidIcon = document.getElementById('emailInvalid');

            if (this.value.length > 0) {
                if (validateEmail(this.value)) {
                    validIcon.classList.remove('hidden');
                    invalidIcon.classList.add('hidden');
                } else {
                    validIcon.classList.add('hidden');
                    invalidIcon.classList.remove('hidden');
                }
            } else {
                validIcon.classList.add('hidden');
                invalidIcon.classList.add('hidden');
            }
        });

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mendaftarkan...';
            submitBtn.disabled = true;
        });

        // Auto-hide error messages
        setTimeout(() => {
            const errorDiv = document.querySelector('.bg-red-500');
            if (errorDiv) {
                errorDiv.style.opacity = '0';
                errorDiv.style.transform = 'translateY(-20px)';
                setTimeout(() => errorDiv.remove(), 300);
            }
        }, 8000);
    </script>
</body>
</html>
