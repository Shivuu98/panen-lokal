@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16">
    <!-- Hero Header Section -->
    <div class="text-center mb-12">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl mb-6">
            <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V9a1 1 0 00-1-1h-1v3a2 2 0 01-2 2H4.5a1.5 1.5 0 010-3H9V7H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V9a2 2 0 00-2-2z" />
            </svg>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-blue-300 mb-4">Artikel Terkini</h2>
        <p class="text-xl text-white max-w-2xl mx-auto">Dapatkan informasi terbaru seputar pertanian, komoditas, dan perkembangan industri agrikultur</p>
        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mx-auto mt-6"></div>
    </div>

    <!-- Articles Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($artikels as $artikel)
            <article class="group">
                <a href="{{ url('/artikel/'.$artikel->id) }}" class="block">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-2xl hover:border-blue-200 transition-all duration-300 h-full flex flex-col">
                        <!-- Article Header -->
                        <div class="relative">
                            <div class="h-2 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-600"></div>
                            <div class="p-6 pb-4">
                                <div class="flex items-center mb-3">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                    <span class="text-blue-600 text-sm font-semibold uppercase tracking-wide">Artikel</span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200 leading-tight">
                                    {{ $artikel->judul }}
                                </h3>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="px-6 pb-4 flex-grow">
                            <p class="text-gray-700 leading-relaxed line-clamp-4">
                                {{ Str::limit(strip_tags($artikel->isi), 150) }}
                            </p>
                        </div>

                        <!-- Article Footer -->
                        <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-100 mt-auto">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $artikel->penulis ?? 'Admin' }}</p>
                                        <p class="text-xs text-gray-500">Penulis</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="flex items-center text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-sm font-medium">{{ $artikel->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Read More Indicator -->
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Artikel</h3>
                    <p class="text-gray-600 max-w-md mx-auto">Artikel-artikel menarik akan segera hadir. Pantau terus halaman ini untuk mendapatkan informasi terbaru.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($artikels->hasPages())
        <div class="mt-16">
            <div class="flex justify-center">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-2">
                    {{ $artikels->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection