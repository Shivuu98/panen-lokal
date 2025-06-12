<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Komoditas - Info Tani Lokal</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-50 min-h-screen">
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-green-100 p-6">
        <h2 class="text-2xl font-bold text-green-800 mb-6">Tambah Komoditas Baru</h2>
        
        <form action="{{ route('admin.komoditas.store') }}" method="POST">
            @csrf

            <!-- Nama Komoditas -->
            <div class="mb-6">
                <label class="block text-green-700 font-medium mb-2">Nama Komoditas</label>
                <input type="text" name="nama" 
                       class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-500"
                       placeholder="Masukkan nama komoditas" required>
            </div>

            <!-- Deskripsi Komoditas -->
            <div class="mb-6">
                <label class="block text-green-700 font-medium mb-2">Deskripsi</label>
                <input name="deskripsi" rows="3"
                          class="w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-500"
                          placeholder="Masukkan deskripsi komoditas" required></input>
            </div>

            <!-- Bulan Panen -->
            <div class="mb-6">
                <label class="block text-green-700 font-medium mb-2">Bulan Panen</label>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="bulan_panen[]" value="{{ $bulan }}" 
                                   class="h-5 w-5 text-green-600 rounded border-green-300 focus:ring-green-200">
                            <span class="ml-2 text-green-700">{{ $bulan }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Harga Komoditas per Bulan -->
            <div class="mb-6">
                <label class="block text-green-700 font-medium mb-4">Harga Komoditas per Bulan</label>
                <div class="space-y-3">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                        <div class="flex items-center gap-4">
                            <span class="w-24 text-green-700">{{ $bulan }}</span>
                            <input type="hidden" name="harga[{{ $loop->index }}][bulan]" value="{{ $bulan }}">
                            <div class="relative flex-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-green-500">Rp</span>
                                </div>
                                <input type="number" name="harga[{{ $loop->index }}][harga]" placeholder="0" 
                                       class="pl-10 w-full px-4 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-500">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-8 space-x-4">
                <a href="{{ route('admin.komoditas.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg shadow-md transition flex items-center">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow-md transition flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Simpan Komoditas
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>