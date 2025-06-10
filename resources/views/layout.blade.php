<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Komoditas Tani Lokal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative min-h-screen">
    <!-- Background Full Section -->
    <div class="fixed inset-0" style="background-image: url('https://ketahananpangan.semarangkota.go.id/v3/content/images/Padi.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="absolute inset-0 bg-black opacity-60 "></div>
    </div>

    <!-- Header yang benar -->
  <header class=" text-white p-6 shadow-lg bg-black bg-opacity-50 relative z-10 mx-12 mt-4 rounded-xl">
    <div class="container mx-auto flex justify-between items-center">
       <div class="flex items-center space-x-3">
           <img src="{{ asset('images/Logo.png') }}" alt="Panen Lokal Logo" class="h-12 w-auto">
           <img src="{{ asset('images/PanenLokal.png') }}" alt="Panen Lokal Logo" class="h-12 w-auto">
</div>
      <nav>
    <a href="{{ url('/') }}" class="mx-2 text-xl relative group">
        <span class="relative">
            Beranda
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </span>
    </a>
    <a href="{{ url('/komoditas') }}" class="mx-2 text-xl relative group">
        <span class="relative">
            Komoditas
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </span>
    </a>
    <a href="{{ url('/login') }}" class="mx-2 text-xl relative group">
        <span class="relative">
            Login
            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
        </span>
    </a>
</nav>
    </div>
</header>

    <!-- Main Content -->
   <div class="relative z-10 mx-12"> <!-- Mengubah mex-12 menjadi mx-12 untuk margin yang sama dengan header -->
    @yield('content')
</div>

    <!-- Footer -->
    <footer class="bg-green-600/90 text-white p-6 relative z-10">
        <div class="container mx-auto text-center">
            <p>© {{ date('Y') }} TaniLokal. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
