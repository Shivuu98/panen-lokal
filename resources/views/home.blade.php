@extends('layouts.app')

@section('content')
    <!-- Hero Section & Fitur Utama -->
    <section class="min-h-screen relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10 min-h-screen flex flex-col justify-between py-20">
            <!-- Hero Content -->
            <div class="mb-16">
                <div class="max-w-4xl">
                    <!-- Animated Title -->
                    <div class="mb-8">
                        <h2 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                            <span class="text-yellow-300 drop-shadow-lg">Informasi Waktu Panen</span>
                            <span class="text-white block mt-2">& Harga Komoditas</span>
                        </h2>
                        <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-green-400 rounded-full mb-6"></div>
                    </div>

                    <p class="text-xl md:text-2xl mb-10 text-green-50 leading-relaxed max-w-3xl">
                        Dapatkan informasi terkini tentang musim panen dan harga komoditas pertanian lokal di daerahmu.
                        <span class="text-yellow-200 font-semibold">Solusi cerdas untuk petani dan konsumen.</span>
                    </p>

                    <!-- CTA Button with enhanced styling -->
                    <div class="flex flex-col sm:flex-row gap-4 items-start">
                        <a href="{{ url('/komoditas') }}" class="group relative bg-gradient-to-r from-green-500 to-green-600 text-white px-10 py-4 rounded-xl font-bold text-lg hover-scale transition-all duration-300 shadow-2xl hover:shadow-green-500/25">
                            <span class="relative z-10 flex items-center">
                                <span class="mr-3">🌾</span>
                                Lihat Komoditas
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-500 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>

                        <button class="glass-effect text-white font-semibold py-4 px-8 rounded-xl hover-scale border border-white/20 text-lg flex items-center">
                            <span class="mr-2">📈</span>
                            Lihat Tren Harga
                        </button>
                    </div>
                </div>
            </div>

            <!-- Fitur Unggulan Section with modern cards -->
            <div class="glass-effect p-8 md:p-12 rounded-3xl backdrop-blur-sm border border-white/10 shadow-2xl">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Fitur <span class="text-gradient">Unggulan</span>
                    </h3>
                    <div class="w-16 h-1 bg-gradient-to-r from-green-400 to-yellow-400 rounded-full mx-auto"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Card 1 - Info Waktu Panen -->
                    <div class="group bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover-scale transition-all duration-500 hover:shadow-2xl hover:bg-white border border-green-100">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">🌾</span>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-3">Info Waktu Panen</h4>
                            <div class="w-12 h-0.5 bg-green-400 rounded-full mx-auto mb-4"></div>
                        </div>
                        <p class="text-gray-600 leading-relaxed text-center">
                            Ketahui bulan-bulan panen utama setiap komoditas pertanian di wilayah lokal dengan data yang akurat dan terpercaya.
                        </p>
                        <div class="mt-6 text-center">
                            <a href="{{ url('/komoditas') }}" class="inline-flex items-center text-green-600 font-semibold text-sm group-hover:text-green-700 transition-colors duration-200">
                                Pelajari lebih lanjut →
                            </a>
                        </div>
                    </div>

                    <!-- Card 2 - Harga Bulanan -->
                    <div class="group bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover-scale transition-all duration-500 hover:shadow-2xl hover:bg-white border border-yellow-100">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">📊</span>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-3">Harga Bulanan</h4>
                            <div class="w-12 h-0.5 bg-yellow-400 rounded-full mx-auto mb-4"></div>
                        </div>
                        <p class="text-gray-600 leading-relaxed text-center">
                            Lihat fluktuasi harga komoditas pertanian berdasarkan bulan dan musim untuk perencanaan bisnis yang lebih baik.
                        </p>
                        <div class="mt-6 text-center">
                            <a href="{{ url('/komoditas') }}" class="inline-flex items-center text-yellow-600 font-semibold text-sm group-hover:text-yellow-700">
                                Lihat grafik harga →
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 - Artikel -->
                    <div class="group bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 hover-scale transition-all duration-500 hover:shadow-2xl hover:bg-white border border-blue-100">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-2xl">📰</span>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-3">Artikel Terbaru</h4>
                            <div class="w-12 h-0.5 bg-blue-400 rounded-full mx-auto mb-4"></div>
                        </div>
                        <p class="text-gray-600 leading-relaxed text-center">
                            Dapatkan informasi terbaru seputar perkembangan komoditas, tips pertanian, dan berita terkini dari dunia agrikultur.
                        </p>
                        <div class="mt-6 text-center">
                            <a href="{{ url('/artikel') }}" class="inline-flex items-center text-blue-600 font-semibold text-sm group-hover:text-blue-700">
                                Baca artikel →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Additional info section -->
                <div class="mt-12 text-center">
                    <p class="text-green-100 text-lg mb-6">
                        Bergabunglah dengan <span class="text-yellow-300 font-bold">10,000+</span> petani dan konsumen yang sudah mempercayai platform kami
                    </p>
                    <div class="flex justify-center items-center space-x-8 text-white/80">
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">✅</span>
                            <span>Data Terpercaya</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl mr-2">📱</span>
                            <span>Mobile Friendly</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
