@extends('admin.layout')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Komoditas</h1>
                    <p class="text-gray-600">Kelola dan atur semua data komoditas pertanian</p>
                </div>
                <a href="{{ route('admin.komoditas.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white px-6 py-3 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg font-medium">
                    <i class="fas fa-plus"></i>
                    Tambah Komoditas
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-6 flex items-center gap-3">
                <i class="fas fa-check-circle text-green-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-seedling text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm">Total Komoditas</p>
                        <p class="text-2xl font-bold text-gray-900">{{ count($komoditas) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm">Daerah Terdaftar</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $komoditas->pluck('daerah')->unique()->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Daftar Komoditas</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-seedling"></i>
                                    Komoditas
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Daerah
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-file-text"></i>
                                    Deskripsi
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-cog"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($komoditas as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-leaf text-green-600 text-lg"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $item->nama }}</h3>
                                        <p class="text-sm text-gray-500">ID: #{{ $item->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-map-marker-alt text-blue-600 text-xs"></i>
                                    </div>
                                    <div>
                                        <span class="font-medium text-gray-900">{{ $item->daerah }}</span>
                                        <p class="text-xs text-gray-500">Lokasi Produksi</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="max-w-xs">
                                    <p class="text-gray-700 line-clamp-2">{{ $item->deskripsi }}</p>
                                    @if(strlen($item->deskripsi) > 100)
                                        <button class="text-green-600 hover:text-green-700 text-sm mt-1">Lihat selengkapnya</button>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button class="inline-flex items-center gap-1 px-3 py-1.5 bg-gray-50 hover:bg-gray-100 text-gray-700 rounded-lg transition-colors text-sm font-medium" title="Lihat Detail">
                                        <i class="fas fa-eye text-xs"></i>
                                        Detail
                                    </button>
                                    <a href="{{ route('admin.komoditas.edit', $item->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg transition-colors text-sm font-medium">
                                        <i class="fas fa-edit text-xs"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.komoditas.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus komoditas {{ $item->nama }}?')" class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 rounded-lg transition-colors text-sm font-medium">
                                            <i class="fas fa-trash text-xs"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            @if($komoditas->isEmpty())
            <div class="text-center py-12">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-seedling text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada komoditas</h3>
                <p class="text-gray-600 mb-6">Mulai dengan menambahkan komoditas pertama Anda</p>
                <a href="{{ route('admin.komoditas.create') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-plus"></i>
                    Tambah Komoditas
                </a>
            </div>
            @endif
        </div>

        <!-- Pagination -->
        @if(method_exists($komoditas, 'links') && $komoditas->hasPages())
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-200 px-6 py-4">
            {{ $komoditas->links() }}
        </div>
        @endif
    </div>
@endsection