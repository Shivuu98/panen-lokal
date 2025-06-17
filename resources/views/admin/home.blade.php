@extends('admin.layout')

@section('content')
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 inline-block border-b-4 border-green-400 pb-2">
            Selamat Datang, Admin!
        </h1>
        <p class="text-gray-600 mt-2">Kelola konten dan data situs Panen Lokal dengan mudah</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card Komoditas -->
        <a href="{{ url('/admin/komoditas') }}" class="bg-white rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center border-t-4 border-green-400">
            <div class="w-16 h-16 mx-auto bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4 text-3xl">
                🌾
            </div>
            <h2 class="text-lg font-semibold text-gray-800">Manajemen Komoditas</h2>
            <p class="text-sm text-gray-500 mt-1">Tambah, ubah, dan hapus data komoditas pertanian</p>
        </a>

        <!-- Card Artikel -->
        <a href="{{ url('/admin/artikel') }}" class="bg-white rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 p-6 text-center border-t-4 border-yellow-400">
            <div class="w-16 h-16 mx-auto bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-4 text-3xl">
                📰
            </div>
            <h2 class="text-lg font-semibold text-gray-800">Manajemen Artikel</h2>
            <p class="text-sm text-gray-500 mt-1">Buat dan atur artikel informatif untuk pengunjung</p>
        </a>
    </div>
@endsection
