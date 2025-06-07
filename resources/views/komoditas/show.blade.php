<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Komoditas - {{ $komoditas->nama }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-green-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Info Tani Lokal</h1>
            <nav>
                <a href="{{ url('/') }}" class="mx-2 hover:underline">Beranda</a>
                <a href="{{ url('/komoditas') }}" class="mx-2 hover:underline">Komoditas</a>
            </nav>
        </div>
    </header>

    <!-- Detail Komoditas -->
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-2">{{ $komoditas->nama }}</h2>
            <p class="mb-4 text-gray-600">
                <span class="font-semibold">Musim Panen:</span>
                {{ implode(', ', $komoditas->musim_panen) }}
            </p>

            <h3 class="text-lg font-semibold mt-6 mb-2">Harga per Bulan</h3>
            <table class="w-full table-auto border text-sm">
                <thead>
                    <tr class="bg-green-100">
                        <th class="border px-4 py-2">Bulan</th>
                        <th class="border px-4 py-2">Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komoditas->harga_bulanan as $bulan => $harga)
                        <tr>
                            <td class="border px-4 py-2">{{ $bulan }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white p-4 mt-12 text-center">
        &copy; {{ date('Y') }} Info Tani Lokal.
    </footer>

</body>
</html>
