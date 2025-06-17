<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-green-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-seedling text-white text-lg"></i>
                        </div>
                        <span class="font-bold text-xl text-gray-800">Admin Panen Lokal</span>
                    </div>
                    <div class="hidden md:flex items-center gap-1">
                        <a href="{{ url('/admin') }}" class="flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-green-600 hover:bg-green-50 transition-all duration-200 font-medium {{ request()->is('admin') && !request()->is('admin/artikel*') && !request()->is('admin/komoditas*') ? 'text-green-700 bg-green-100 font-semibold' : '' }}">
                            <i class="fas fa-chart-line mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.artikel.index') }}" class="flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-green-600 hover:bg-green-50 transition-all duration-200 font-medium {{ request()->is('admin/artikel*') ? 'text-green-700 bg-green-100 font-semibold' : '' }}">
                            <i class="fas fa-newspaper mr-2"></i>
                            Manajemen Artikel
                        </a>
                        <a href="{{ route('admin.komoditas.index') }}" class="flex items-center px-4 py-2 rounded-lg text-gray-600 hover:text-green-600 hover:bg-green-50 transition-all duration-200 font-medium {{ request()->is('admin/komoditas*') ? 'text-green-700 bg-green-100 font-semibold' : '' }}">
                            <i class="fas fa-boxes mr-2"></i>
                            Manajemen Komoditas
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 text-gray-600 hover:text-green-600 transition-colors px-3 py-2 rounded-lg hover:bg-gray-50">
                        <i class="fas fa-external-link-alt text-sm"></i>
                        <span class="hidden sm:inline">Lihat Website</span>
                    </a>
                    <form action="{{ url('/logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 px-4 py-2 rounded-lg text-white transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="p-8">
        @yield('content')
    </main>
</body>
</html>