@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Komoditas</h1>

    @foreach ($komoditas as $item)
        <div class="bg-white shadow rounded-lg p-4 mb-4">
            <h2 class="text-xl font-semibold">{{ $item->nama }}</h2>
            <p>Musim Panen: {{ implode(', ', $item->musim_panen) }}</p>
            <p>Harga Bulan Ini: Rp{{ number_format($item->harga_bulan_ini, 0, ',', '.') }}</p>
            <a href="{{ url('/komoditas/' . $item->id) }}" class="text-blue-600 hover:underline">Lihat Detail</a>
        </div>
    @endforeach
</div>
@endsection
