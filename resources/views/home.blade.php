@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Komoditas yang Panen Bulan Ini (Mei)</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach ($komoditas as $item)
        <div class="border p-4 mb-3">
            <h2 class="text-lg font-semibold">{{ $item->nama }}</h2>
            <p>Musim Panen: {{ implode(', ', $item->musim_panen) }}</p>
            <p>Harga Bulan Ini: Rp{{ number_format($item->harga_bulan_ini, 0, ',', '.') }}</p>
        </div>
    @endforeach

</div>
@endsection
