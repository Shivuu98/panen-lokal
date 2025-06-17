@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-16 max-w-3xl">
    <!-- Artikel -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8 mb-10">
        <h2 class="text-4xl font-bold text-gray-800 mb-3">{{ $artikel->judul }}</h2>
        <div class="text-sm text-gray-500 mb-6">
            Penulis: <span class="font-medium text-gray-700">{{ $artikel->penulis ?? 'Admin' }}</span>
            &bull; {{ $artikel->created_at->format('d M Y') }}
        </div>
        <div class="prose prose-lg max-w-none text-gray-800 mb-8">{!! $artikel->isi !!}</div>
        <a href="{{ url('/artikel') }}" class="inline-block text-green-700 hover:underline font-medium text-sm">
            &larr; Kembali ke Daftar Artikel
        </a>
    </div>

    <!-- Komentar -->
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 mb-6">
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Komentar</h3>
        @forelse($artikel->komentars as $komentar)
            <div class="mb-4 border border-gray-100 rounded-lg p-4 bg-gray-50">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-700 text-sm">
                        {{ $komentar->user->name ?? 'Anonim' }}
                    </span>
                    <span class="text-xs text-gray-500">
                        {{ $komentar->created_at->format('d M Y H:i') }}
                    </span>
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <form action="{{ route('komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin hapus komentar ini?')" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 text-xs hover:underline">Hapus</button>
                            </form>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-700 text-sm">{{ $komentar->isi }}</p>
            </div>
        @empty
            <p class="text-gray-500 text-sm">Belum ada komentar.</p>
        @endforelse
    </div>

    <!-- Form Komentar -->
    @auth
    <form action="{{ route('komentar.store', $artikel->id) }}" method="POST" class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">
        @csrf
        <textarea name="isi" rows="4" class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-green-200 text-sm resize-none" placeholder="Tulis komentar..." required></textarea>
        <button class="mt-4 inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-semibold text-sm">
            Kirim Komentar
        </button>
    </form>
    @else
    <div class="text-sm text-gray-600 mt-6">
        <span class="italic">Silakan <a href="{{ route('login') }}" class="text-green-600 hover:underline font-medium">login</a> untuk memberikan komentar.</span>
    </div>
    @endauth
</div>
@endsection
