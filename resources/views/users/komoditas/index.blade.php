@extends('layouts.app')

@section('content')

    <main class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <!-- Kotak Ikon -->
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-orange-100 to-orange-100 rounded-2xl mb-6 text-2xl">
                <span class="text-blue-600">🌾</span>
            </div>

            <!-- Judul & Deskripsi -->
            <h2 class="text-4xl md:text-5xl font-bold text-yellow-300 mb-4">Daftar Komoditas</h2>
            <p class="text-xl text-white max-w-2xl mx-auto">
                Dapatkan informasi terbaru seputar pertanian, komoditas, dan perkembangan industri agrikultur
            </p>

            <!-- Garis Hias -->
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-full mx-auto mt-6"></div>
        </div>


        <!-- Filter Section -->
        <div class="mb-8 flex justify-end">
            <form method="GET" action="{{ url('/komoditas') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 hover:shadow-md transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-emerald-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                        <label for="daerah" class="font-semibold text-gray-700">Filter Daerah:</label>
                    </div>
                    <select name="daerah" id="daerah" onchange="this.form.submit()" class="border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors min-w-48">
                        <option value="">Semua Daerah</option>
                        @foreach($daerahList as $daerah)
                            <option value="{{ $daerah }}" {{ request('daerah') == $daerah ? 'selected' : '' }}>{{ $daerah }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($komoditas as $item)
                <div class="bg-white rounded-lg shadow-sm border-l-4 border-emerald-500 hover:shadow-md transition-all duration-200">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-900">{{ $item->nama }}</h3>
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-sm font-medium rounded-full">
                                {{ $item->daerah }}
                            </span>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Musim Panen:</p>
                            <p class="text-gray-800 font-medium">{{ implode(', ', $item->musimPanen->pluck('bulan')->toArray()) }}</p>
                        </div>
                        
                        <a href="{{ url('/komoditas/' . $item->id) }}" class="text-emerald-600 hover:text-emerald-700 font-semibold hover:underline transition-colors">
                            Lihat Detail Harga →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State (if no data) -->
        @if($komoditas->isEmpty())
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak ada komoditas ditemukan</h3>
                <p class="text-gray-600">Coba ubah filter pencarian Anda</p>
            </div>
        @endif
    </main>

@endsection