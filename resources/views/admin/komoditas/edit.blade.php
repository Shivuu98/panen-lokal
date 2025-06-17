@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Komoditas</h1>
        <p class="text-gray-600">Perbarui informasi komoditas pertanian di bawah ini</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form action="{{ route('admin.komoditas.update', $komoditas->id) }}" method="POST" class="p-8 space-y-8">
            @csrf
            @method('PUT')

            <!-- Informasi Dasar -->
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-900 border-b border-gray-100 pb-3">
                    Informasi Dasar
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Komoditas</label>
                        <input type="text" name="nama" value="{{ old('nama', $komoditas->nama) }}"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                               placeholder="Contoh: Padi, Jagung, Cabai" required>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Daerah Asal</label>
                        <input type="text" name="daerah" value="{{ old('daerah', $komoditas->daerah) }}"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"
                               placeholder="Contoh: Jember, Banyuwangi" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors resize-none"
                              placeholder="Jelaskan karakteristik, keunggulan, dan informasi penting lainnya tentang komoditas ini..." required>{{ old('deskripsi', $komoditas->deskripsi) }}</textarea>
                </div>
            </div>

            <!-- Bulan Panen -->
            <div class="space-y-6">
                <h2 class="text-xl font-semibold text-gray-900 border-b border-gray-100 pb-3">
                    Bulan Panen
                </h2>

                @php
                    $bulanTerpilih = old('bulan_panen', $komoditas->musimPanen->pluck('bulan')->toArray() ?? []);
                @endphp

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                        <label class="relative flex items-center p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors group">
                            <input type="checkbox" name="bulan_panen[]" value="{{ $bulan }}" class="sr-only peer" {{ in_array($bulan, $bulanTerpilih) ? 'checked' : '' }}>
                            <div class="w-5 h-5 border-2 border-gray-300 rounded-md peer-checked:bg-green-500 peer-checked:border-green-500 flex items-center justify-center transition-colors">
                                <svg class="w-3 h-3 text-white opacity-0 peer-checked:opacity-100" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-700 group-hover:text-gray-900">{{ $bulan }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Harga per Bulan -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-900">
                        Harga per Bulan
                    </h2>
                    <button type="button" class="text-green-600 hover:text-green-700 font-medium text-sm" onclick="togglePriceSection()">
                        <span id="priceToggleText">Tampilkan Semua</span>
                    </button>
                </div>

                <div id="priceSection" class="hidden space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $hargaBulanan = $komoditas->harga->pluck('harga', 'bulan')->toArray();
                        @endphp
                        @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $i => $bulan)
                            <div class="flex items-center gap-3">
                                <span class="w-20 text-sm font-medium text-gray-700">{{ $bulan }}</span>
                                <input type="hidden" name="harga[{{ $i }}][bulan]" value="{{ $bulan }}">
                                <div class="relative flex-1">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">Rp</span>
                                    <input type="number" name="harga[{{ $i }}][harga]"
                                           class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                           placeholder="0" value="{{ old('harga.'.$i.'.harga', $hargaBulanan[$bulan] ?? '') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.komoditas.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors font-medium">
                    Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Komoditas
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePriceSection() {
        const section = document.getElementById('priceSection');
        const toggleText = document.getElementById('priceToggleText');
        
        if (section.classList.contains('hidden')) {
            section.classList.remove('hidden');
            toggleText.textContent = 'Sembunyikan';
        } else {
            section.classList.add('hidden');
            toggleText.textContent = 'Tampilkan Semua';
        }
    }
</script>
@endsection
