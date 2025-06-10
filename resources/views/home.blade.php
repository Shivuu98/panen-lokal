@extends('layout')

@section('content')
    <!-- Hero Section & Fitur Utama -->
    <section class="bg-transparent min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 z-0"></div>
        <div class="container mx-auto px-6 relative z-10 min-h-screen flex flex-col justify-between py-20">
            <!-- Hero Content -->
            <div class="mb-16">
                <div class="max-w-2xl">
                    <h2 class="text-5xl font-bold mb-6 text-yellow-300">
                        Informasi Waktu Panen & Harga Komoditas
                    </h2>
                    <p class="text-xl mb-8 text-white">
                        Dapatkan informasi terkini tentang musim panen dan harga komoditas pertanian lokal di daerahmu.
                        Solusi cerdas untuk petani dan konsumen.
                    </p>
                </div>
                <a href="{{ url('/komoditas') }}" class="bg-green-500 text-white px-8 py-4 rounded-lg hover:bg-green-600 transition">
                    Lihat Komoditas
                </a>
            </div>

            <div class="bg-black bg-opacity-50 p-8 rounded-xl backdrop-blur-sm">
                <h3 class="text-3xl font-semibold text-center mb-10 text-white">
                    Fitur Unggulan
                </h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-md p-6 max-w-sm mx-auto w-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <h4 class="text-xl font-bold mb-2">Info Waktu Panen</h4>
                        <p class="text-gray-600">
                            Ketahui bulan-bulan panen utama setiap komoditas pertanian di wilayah lokal.
                        </p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 max-w-sm mx-auto w-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <h4 class="text-xl font-bold mb-2">Harga Bulanan</h4>
                        <p class="text-gray-600">
                            Lihat fluktuasi harga komoditas pertanian berdasarkan bulan dan musim.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
