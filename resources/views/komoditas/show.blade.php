@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detail Komoditas: {{ $komoditas->nama }}</h1>

<div class="bg-white shadow p-6 rounded mb-6">
    <h1>{{ $komoditas->nama }}</h1>
    <p>Musim Panen: {{ implode(', ', $komoditas->musim_panen) }}</p>

    <p><strong>Harga Bulan Ini:</strong> Rp {{ number_format($komoditas->harga_bulan_ini) }}/kg</p>
</div>

<h2 class="text-xl font-semibold mb-2">Harga per Bulan</h2>
<table class="w-full bg-white shadow rounded mb-6">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="p-3">Bulan</th>
            <th class="p-3">Harga (Rp)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($harga_bulanan as $bulan => $harga)
        <tr class="border-t">
            <td class="p-3">{{ $bulan }}</td>
            <td class="p-3">Rp {{ number_format($harga) }}/kg</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Placeholder chart -->
<div class="bg-white p-4 rounded shadow">
    <p class="mb-2 font-medium">[Grafik Harga per Bulan Placeholder]</p>
    <!-- Bisa pakai Chart.js di sini jika mau -->
</div>
@endsection
