<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Komoditas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <header class="bg-green-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Info Komoditas</h1>
            <nav>
                <a href="{{ url('/') }}" class="mx-2 hover:underline">Beranda</a>
                <a href="{{ url('/komoditas') }}" class="mx-2 hover:underline font-semibold">Komoditas</a>
                <a href="{{ url('/login') }}" class="mx-2 hover:underline">Login</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Daftar Komoditas</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($komoditas as $item)
                <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">{{ $item->nama }}</h3>
                    <p class="text-gray-600 mb-1">Musim Panen: {{ implode(', ', $item->musim_panen) }}</p>
                    <a href="{{ url('/komoditas/' . $item->id) }}" class="text-green-600 hover:underline mt-2 inline-block">
                        Lihat Detail Harga
                    </a>
                </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-green-600 text-white p-4 mt-12 text-center">
        &copy; {{ date('Y') }} Info Tani Lokal. Semua hak dilindungi.
    </footer>

</body>
</html>
