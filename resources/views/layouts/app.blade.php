<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PanenKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <nav class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="/" class="font-bold text-xl">🌾 PanenLokal</a>
            <div>
                <a href="/" class="mr-4 hover:underline">Beranda</a>
                <a href="/komoditas" class="hover:underline">Komoditas</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-500 mt-10">
        &copy; {{ date('Y') }} PanenKu
    </footer>
</body>
</html>
