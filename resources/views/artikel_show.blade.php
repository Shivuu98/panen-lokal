@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-16 max-w-2xl">
    <div class="glass-effect p-8 rounded-xl shadow">
        <h2 class="text-3xl font-bold mb-4">{{ $artikel->judul }}</h2>
        <div class="mb-4 text-gray-500 text-sm">Penulis: {{ $artikel->penulis ?? 'Admin' }} | {{ $artikel->created_at->format('d M Y') }}</div>
        <div class="prose max-w-none mb-8">{!! $artikel->isi !!}</div>
        <a href="{{ url('/artikel') }}" class="text-green-600 hover:underline">&larr; Kembali ke Daftar Artikel</a>
    </div>

    <!-- Daftar Komentar -->
    <div class="mt-8">
        <h2 class="font-bold mb-2">Komentar</h2>
        @foreach($artikel->komentars as $komentar)
            <div class="mb-2 p-2 bg-gray-100 rounded">
                <div class="text-sm text-gray-700 font-semibold">
                    {{ $komentar->user->name ?? 'Anonim' }}
                    <span class="text-xs text-gray-500 ml-2">
                        {{ $komentar->created_at->format('d M Y H:i') }}
                    </span>
                </div>
                <div>{{ $komentar->isi }}</div>
            </div>
        @endforeach
    </div>

    <!-- Form Komentar -->
    @auth
    <form action="{{ route('komentar.store', $artikel->id) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="isi" rows="3" class="w-full border p-2 rounded" placeholder="Tulis komentar..." required></textarea>
        <button class="bg-green-600 text-white px-4 py-2 rounded mt-2">Kirim</button>
    </form>
    @else
    <p class="mt-4 text-sm text-gray-600">Login untuk berkomentar.</p>
    @endauth
</div>
@endsection
