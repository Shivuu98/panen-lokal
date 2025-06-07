<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Komoditas Tani Lokal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Header -->
    <header class="bg-green-600 text-white p-6 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Info Tani Lokal</h1>
            <nav>
                <a href="{{ url('/') }}" class="mx-2 hover:underline">Beranda</a>
                <a href="{{ url('/komoditas') }}" class="mx-2 hover:underline">Komoditas</a>
                <a href="{{ url('/login') }}" class="mx-2 hover:underline">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-4">Informasi Waktu Panen & Harga Komoditas</h2>
            <p class="text-lg mb-6">
                Dapatkan informasi terkini tentang musim panen dan harga komoditas pertanian lokal di daerahmu. 
                Solusi cerdas untuk petani dan konsumen.
            </p>
            <a href="{{ url('/komoditas') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition">
                Lihat Komoditas
            </a>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section class="py-16 bg-green-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-semibold text-center mb-10">Fitur Unggulan</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h4 class="text-xl font-bold mb-2">Info Waktu Panen</h4>
                    <p class="text-gray-600">Ketahui bulan-bulan panen utama setiap komoditas pertanian di wilayah lokal.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h4 class="text-xl font-bold mb-2">Harga Bulanan</h4>
                    <p class="text-gray-600">Lihat fluktuasi harga komoditas pertanian berdasarkan bulan dan musim.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h4 class="text-xl font-bold mb-2">Dashboard Admin</h4>
                    <p class="text-gray-600">Fitur khusus untuk admin dalam mengelola data komoditas dan harga dengan mudah.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-600 text-white p-6 mt-10">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Info Tani Lokal. Semua hak dilindungi.</p>
        </div>
    </footer>

</body>
</html>
