@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-8 text-center">Artikel Terkini</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($artikels as $artikel)
            <a href="{{ url('/artikel/'.$artikel->id) }}" class="block group">
                <div class="glass-effect p-6 rounded-xl shadow hover-scale transition cursor-pointer h-full flex flex-col">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-green-600 transition">{{ $artikel->judul }}</h3>
                    <p class="text-gray-700 mb-4 flex-grow">{{ Str::limit(strip_tags($artikel->isi), 120) }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500 mt-auto">
                        <span>Penulis: {{ $artikel->penulis ?? 'Admin' }}</span>
                        <span>{{ $artikel->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </a>
        @empty
            <p>Tidak ada artikel.</p>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $artikels->links() }}
    </div>
</div>
@endsection
