@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-16 max-w-2xl">
    <div class="glass-effect p-8 rounded-xl shadow">
        <h2 class="text-3xl font-bold mb-4">{{ $artikel->judul }}</h2>
        <div class="mb-4 text-gray-500 text-sm">Penulis: {{ $artikel->penulis ?? 'Admin' }} | {{ $artikel->created_at->format('d M Y') }}</div>
        <div class="prose max-w-none mb-8">{!! $artikel->isi !!}</div>
        <a href="{{ url('/artikel') }}" class="text-green-600 hover:underline">&larr; Kembali ke Daftar Artikel</a>
    </div>
</div>
@endsection