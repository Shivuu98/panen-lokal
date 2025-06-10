@extends('layout')

@section('content')
<!-- Hero Section -->
<section class="bg-white py-40 relative overflow-hidden">
    <div class="absolute inset-0 z-0 h-[600px]">
        <div class="h-full w-full bg-cover bg-center relative" style="background-image: url('https://ketahananpangan.semarangkota.go.id/v3/content/images/Padi.jpg');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
    </div>
    <div class="container mx-auto px-6 max-w-1/2 text-left relative z-10">
        <h2 class="text-5xl font-bold mb-6 text-yellow-300">Informasi Waktu Panen<br>& Harga Komoditas</h2>
        <p class="text-xl mb-8 text-white">
            Dapatkan informasi terkini tentang musim panen dan harga komoditas pertanian lokal di daerahmu.
            Solusi cerdas untuk petani dan konsumen.
        </p>
        <a href="{{ url('/komoditas') }}" class="bg-green-500 text-white px-8 py-4 rounded-lg hover:bg-green-600 transition">
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
@endsection
