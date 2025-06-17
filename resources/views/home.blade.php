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


    <!-- Section Gabungan: Fitur Unggulan, Cara Kerja, Testimoni, FAQ -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="glass-effect rounded-3xl p-8 md:p-12 shadow-2xl border border-white/10 space-y-20">

                <!-- Fitur Unggulan -->
                <div>
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
                            <p class="text-gray-800 leading-relaxed text-center">
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
                            <p class="text-gray-800 leading-relaxed text-center">
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
                            <p class="text-gray-800 leading-relaxed text-center">
                                Dapatkan informasi terbaru seputar perkembangan komoditas, tips pertanian, dan berita terkini dari dunia agrikultur.
                            </p>
                            <div class="mt-6 text-center">
                                <a href="{{ url('/artikel') }}" class="inline-flex items-center text-blue-600 font-semibold text-sm group-hover:text-blue-700">
                                    Baca artikel →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cara Kerja -->
                <div>
                    <div class="text-center mb-16">
                        <h3 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                            Cara <span class="text-gradient bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Kerja</span>
                        </h3>
                        <p class="text-xl text-white max-w-2xl mx-auto">
                            Langkah mudah untuk mendapatkan informasi komoditas pertanian
                        </p>
                        <div class="w-20 h-1 bg-gradient-to-r from-green-400 to-blue-400 rounded-full mx-auto mt-6"></div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-12 max-w-6xl mx-auto">
                        <!-- Step 1 -->
                        <div class="text-center group">
                            <div class="relative mb-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                    <span class="text-3xl text-white font-bold">1</span>
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full animate-pulse"></div>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Pilih Komoditas</h4>
                            <p class="text-white leading-relaxed">
                                Pilih jenis komoditas pertanian yang ingin Anda ketahui informasinya dari daftar lengkap yang tersedia.
                            </p>
                        </div>

                        <!-- Step 2 -->
                        <div class="text-center group">
                            <div class="relative mb-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                    <span class="text-3xl text-white font-bold">2</span>
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full animate-pulse"></div>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Lihat Informasi</h4>
                            <p class="text-white leading-relaxed">
                                Dapatkan informasi lengkap tentang waktu panen, fluktuasi harga, dan tren pasar untuk komoditas pilihan Anda.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div class="text-center group">
                            <div class="relative mb-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mx-auto shadow-2xl group-hover:scale-110 transition-transform duration-300">
                                    <span class="text-3xl text-white font-bold">3</span>
                                </div>
                                <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full animate-pulse"></div>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">Buat Keputusan</h4>
                            <p class="text-white leading-relaxed">
                                Gunakan data yang akurat untuk membuat keputusan terbaik dalam bertani, membeli, atau menjual komoditas.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial -->
                <div>
                    <div class="text-center mb-16">
                        <h3 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                            Apa Kata <span class="text-gradient bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Pengguna</span>
                        </h3>
                        <p class="text-xl text-white max-w-2xl mx-auto">
                            Testimoni dari petani dan konsumen yang telah merasakan manfaat platform kami
                        </p>
                        <div class="w-20 h-1 bg-gradient-to-r from-green-400 to-blue-400 rounded-full mx-auto mt-6"></div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                        <!-- Testimonial 1 -->
                        <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-green-100">
                            <div class="flex items-center mb-6">
                                <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=22c55e&color=fff&size=60" alt="Budi Santoso" class="w-15 h-15 rounded-full mr-4">
                                <div>
                                    <h5 class="font-bold text-gray-800">Budi Santoso</h5>
                                    <p class="text-white text-sm">Petani Padi - Jawa Barat</p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed mb-4">
                                "Platform ini sangat membantu saya menentukan waktu tanam dan panen yang tepat. Sekarang hasil panen saya lebih optimal dan untung lebih besar!"
                            </p>
                            <div class="flex text-yellow-400">
                                <span>⭐⭐⭐⭐⭐</span>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-yellow-100">
                            <div class="flex items-center mb-6">
                                <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza&background=f59e0b&color=fff&size=60" alt="Siti Nurhaliza" class="w-15 h-15 rounded-full mr-4">
                                <div>
                                    <h5 class="font-bold text-gray-800">Siti Nurhaliza</h5>
                                    <p class="text-white text-sm">Pedagang - Jawa Tengah</p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed mb-4">
                                "Informasi harga yang akurat membantu saya dalam menentukan strategi jual beli. Keuntungan usaha saya meningkat signifikan!"
                            </p>
                            <div class="flex text-yellow-400">
                                <span>⭐⭐⭐⭐⭐</span>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-blue-100">
                            <div class="flex items-center mb-6">
                                <img src="https://ui-avatars.com/api/?name=Ahmad+Rahman&background=3b82f6&color=fff&size=60" alt="Ahmad Rahman" class="w-15 h-15 rounded-full mr-4">
                                <div>
                                    <h5 class="font-bold text-gray-800">Ahmad Rahman</h5>
                                    <p class="text-white text-sm">Konsumen - Jawa Timur</p>
                                </div>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed mb-4">
                                "Sebagai konsumen, saya jadi tahu kapan waktu terbaik membeli sayuran segar dengan harga yang wajar. Sangat praktis!"
                            </p>
                            <div class="flex text-yellow-400">
                                <span>⭐⭐⭐⭐⭐</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div>
                    <div class="text-center mb-16">
                        <h3 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                            Pertanyaan <span class="text-gradient bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">Umum</span>
                        </h3>
                        <p class="text-xl text-white max-w-2xl mx-auto">
                            Jawaban untuk pertanyaan yang sering diajukan tentang platform kami
                        </p>
                        <div class="w-20 h-1 bg-gradient-to-r from-green-400 to-blue-400 rounded-full mx-auto mt-6"></div>
                    </div>
                    <div class="max-w-4xl mx-auto">
                        <div class="space-y-6">
                            <!-- FAQ Item 1 -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                                <button class="w-full text-left p-6 hover:bg-gray-50 transition-colors duration-200" onclick="toggleFAQ(1)">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-bold text-gray-800">Apakah platform ini gratis?</h4>
                                        <span class="faq-icon text-2xl text-green-600 transform transition-transform duration-200" id="icon-1">+</span>
                                    </div>
                                </button>
                                <div class="faq-content px-6 pb-6 hidden" id="content-1">
                                    <p class="text-white leading-relaxed">
                                        Ya, platform kami 100% gratis untuk digunakan. Kami berkomitmen menyediakan informasi komoditas pertanian yang dapat diakses oleh semua petani dan konsumen tanpa biaya apapun.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 2 -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                                <button class="w-full text-left p-6 hover:bg-gray-50 transition-colors duration-200" onclick="toggleFAQ(2)">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-bold text-gray-800">Seberapa akurat data yang disediakan?</h4>
                                        <span class="faq-icon text-2xl text-green-600 transform transition-transform duration-200" id="icon-2">+</span>
                                    </div>
                                </button>
                                <div class="faq-content px-6 pb-6 hidden" id="content-2">
                                    <p class="text-white leading-relaxed">
                                        Data kami dikumpulkan dari berbagai sumber terpercaya termasuk BPS, Kementerian Pertanian, dan pasar lokal. Tingkat akurasi mencapai 99% dengan update berkala setiap hari.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 3 -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                                <button class="w-full text-left p-6 hover:bg-gray-50 transition-colors duration-200" onclick="toggleFAQ(3)">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-bold text-gray-800">Apakah bisa diakses via mobile?</h4>
                                        <span class="faq-icon text-2xl text-green-600 transform transition-transform duration-200" id="icon-3">+</span>
                                    </div>
                                </button>
                                <div class="faq-content px-6 pb-6 hidden" id="content-3">
                                    <p class="text-white leading-relaxed">
                                        Tentu saja! Platform kami didesain responsive dan mobile-friendly. Anda dapat mengaksesnya dengan mudah melalui smartphone, tablet, atau komputer kapan saja dan di mana saja.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 4 -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                                <button class="w-full text-left p-6 hover:bg-gray-50 transition-colors duration-200" onclick="toggleFAQ(4)">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-bold text-gray-800">Wilayah mana saja yang dicakup?</h4>
                                        <span class="faq-icon text-2xl text-green-600 transform transition-transform duration-200" id="icon-4">+</span>
                                    </div>
                                </button>
                                <div class="faq-content px-6 pb-6 hidden" id="content-4">
                                    <p class="text-white leading-relaxed">
                                        Platform kami mencakup seluruh wilayah Indonesia, dari 34 provinsi dengan fokus khusus pada sentra-sentra produksi pertanian. Data lebih lengkap tersedia untuk Jawa, Sumatera, dan Sulawesi.
                                    </p>
                                </div>
                            </div>

                            <!-- FAQ Item 5 -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                                <button class="w-full text-left p-6 hover:bg-gray-50 transition-colors duration-200" onclick="toggleFAQ(5)">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-lg font-bold text-gray-800">Bagaimana cara mendaftar?</h4>
                                        <span class="faq-icon text-2xl text-green-600 transform transition-transform duration-200" id="icon-5">+</span>
                                    </div>
                                </button>
                                <div class="faq-content px-6 pb-6 hidden" id="content-5">
                                    <p class="text-white leading-relaxed">
                                        Tidak perlu mendaftar untuk mengakses informasi dasar. Namun jika ingin mendapatkan notifikasi harga dan alert khusus, Anda bisa mendaftar dengan email dan nomor telepon.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .text-gradient {
            background: linear-gradient(135deg, #10b981, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .counter {
            animation: countUp 2s ease-out forwards;
        }
        @keyframes countUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <script>
        // FAQ Toggle Function
        function toggleFAQ(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.textContent = '−';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.classList.add('hidden');
                icon.textContent = '+';
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
@endsection
