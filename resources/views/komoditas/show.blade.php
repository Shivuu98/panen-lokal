<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Komoditas - {{ $komoditas->nama }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-green-600 text-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <h1 class="text-2xl font-bold mb-2 md:mb-0">Info Tani Lokal</h1>
                <nav class="flex space-x-1 md:space-x-4">
                    <a href="{{ url('/') }}" class="px-3 py-1 rounded hover:bg-green-700 transition">Beranda</a>
                    <a href="{{ url('/komoditas') }}" class="px-3 py-1 rounded hover:bg-green-700 transition">Komoditas</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Komoditas Header -->
                <div class="bg-green-500 text-white px-6 py-4">
                    <h2 class="text-2xl md:text-3xl font-bold">{{ $komoditas->nama }}</h2>
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Deskripsi</h3>
                        <div class="flex flex-wrap gap-2">
                            {{ $komoditas->deskripsi }}
                        </div>
                            
                    </div>
                    <!-- Musim Panen -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Musim Panen</h3>
                        <div class="flex flex-wrap gap-2">
                            @if($komoditas->musimPanen->count())
                                @foreach($komoditas->musimPanen as $musim)
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                        {{ $musim->bulan }}
                                    </span>
                                @endforeach
                            @else
                                <p class="text-gray-500">-</p>
                            @endif
                        </div>
                    </div>

                    <!-- Harga Bulanan -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Harga per Bulan</h3>
                        
                        @if ($komoditas->harga && $komoditas->harga->count())
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="px-4 py-3 text-left border-b-2 border-gray-200">Bulan</th>
                                            <th class="px-4 py-3 text-left border-b-2 border-gray-200">Harga (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($komoditas->harga as $harga)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-4 py-3 border-b border-gray-200">{{ $harga->bulan }}</td>
                                                <td class="px-4 py-3 border-b border-gray-200 font-medium">
                                                    Rp {{ number_format($harga->harga, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <p class="text-yellow-700">Belum ada data harga bulanan.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-green-600 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Info Tani Lokal. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>