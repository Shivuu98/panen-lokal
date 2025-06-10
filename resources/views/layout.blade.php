<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Komoditas Tani Lokal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">
    @include('navbar')

    @yield('content')

    <footer class="bg-green-600 text-white p-6 mt-10">
        <div class="container mx-auto text-center">
            <p>© {{ date('Y') }} Info Tani Lokal. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
