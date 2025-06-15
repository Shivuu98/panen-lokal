<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-green-700 text-white px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-8">
            <span class="font-bold text-xl">Admin Panen Lokal</span>
            <a href="{{ url('/admin') }}" class="hover:underline {{ request()->is('admin') && !request()->is('admin/artikel*') && !request()->is('admin/komoditas*') ? 'font-bold underline' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.artikel.index') }}" class="hover:underline {{ request()->is('admin/artikel*') ? 'font-bold underline' : '' }}">
                Manajemen Artikel
            </a>
            <a href="{{ route('admin.komoditas.index') }}" class="hover:underline {{ request()->is('admin/komoditas*') ? 'font-bold underline' : '' }}">
                Manajemen Komoditas
            </a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="hover:underline">Lihat Website</a>
            <form action="{{ url('/logout') }}" method="POST" class="inline">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 px-4 py-1 rounded text-white">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="p-8">
        @yield('content')
    </main>
</body>
</html>
