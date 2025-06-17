@extends('layouts.app')

@section('title', 'Detail Komoditas - ' . $komoditas->nama)

@push('styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
@endpush

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- Hero Section - Redesigned -->
    <div class="bg-white border-l-4 border-emerald-500 rounded-lg shadow-lg mb-8 hover:shadow-xl transition-all duration-300">
        <div class="px-8 py-8">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center mb-3">
                        <div class="w-3 h-3 bg-emerald-500 rounded-full mr-3"></div>
                        <span class="text-emerald-600 text-sm font-semibold uppercase tracking-wide">Komoditas</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2 leading-tight">{{ $komoditas->nama }}</h1>
                    <p class="text-gray-600 text-lg">Informasi Lengkap Komoditas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Deskripsi -->
            <section class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        Deskripsi Komoditas
                    </h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 leading-relaxed text-lg">{{ $komoditas->deskripsi }}</p>
                </div>
            </section>

            <!-- Harga Bulanan -->
            <section class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        Data Harga Bulanan
                    </h3>
                </div>
                <div class="p-6">
                    @if ($komoditas->harga && $komoditas->harga->count())
                        <div class="overflow-hidden rounded-xl border border-gray-200">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100">
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Bulan</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Harga</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-900 uppercase tracking-wider">Perubahan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php $previousPrice = null; @endphp
                                    @foreach ($komoditas->harga as $harga)
                                        <tr class="hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 transition-all duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3"></div>
                                                    <span class="text-sm font-medium text-gray-900">{{ $harga->bulan }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-lg font-bold text-gray-900">
                                                    Rp {{ number_format($harga->harga, 0, ',', '.') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($previousPrice !== null)
                                                    @php
                                                        $change = $harga->harga - $previousPrice;
                                                        $changePercent = ($change / $previousPrice) * 100;
                                                    @endphp
                                                    @if($change > 0)
                                                        <div class="flex items-center">
                                                            <div class="w-6 h-6 bg-red-100 rounded-full flex items-center justify-center mr-2">
                                                                <svg class="w-3 h-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                            <div>
                                                                <span class="text-red-600 font-bold text-sm">
                                                                    +Rp {{ number_format($change, 0, ',', '.') }}
                                                                </span>
                                                                <span class="text-red-500 text-xs block">
                                                                    (+{{ number_format($changePercent, 1) }}%)
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @elseif($change < 0)
                                                        <div class="flex items-center">
                                                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-2">
                                                                <svg class="w-3 h-3 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 112 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                            <div>
                                                                <span class="text-green-600 font-bold text-sm">
                                                                    -Rp {{ number_format(abs($change), 0, ',', '.') }}
                                                                </span>
                                                                <span class="text-green-500 text-xs block">
                                                                    ({{ number_format($changePercent, 1) }}%)
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center">
                                                            <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center mr-2">
                                                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                                                            </div>
                                                            <span class="text-gray-500 text-sm font-medium">Tidak berubah</span>
                                                        </div>
                                                    @endif
                                                @else
                                                    <span class="text-gray-400 text-sm">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @php $previousPrice = $harga->harga; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="text-yellow-800 font-medium">Belum ada data harga bulanan.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>

        <!-- Right Column -->
        <div class="space-y-8">
            <!-- Musim Panen -->
            <section class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-amber-50 to-orange-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center">
                        <div class="w-8 h-8 bg-amber-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        Musim Panen
                    </h3>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-3">
                        @forelse($komoditas->musimPanen as $musim)
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 hover:from-green-200 hover:to-emerald-200 transition-all duration-200 cursor-default">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                {{ $musim->bulan }}
                            </span>
                        @empty
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">Belum ada data musim panen</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <!-- Quick Stats -->
            @if ($komoditas->harga && $komoditas->harga->count())
                @php
                    $prices = $komoditas->harga->pluck('harga');
                    $minPrice = $prices->min();
                    $maxPrice = $prices->max();
                    $avgPrice = $prices->avg();
                @endphp
                <section class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                </svg>
                            </div>
                            Statistik Harga
                        </h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-red-50 to-pink-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-400 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Tertinggi</span>
                            </div>
                            <span class="text-lg font-bold text-red-600">Rp {{ number_format($maxPrice, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Terendah</span>
                            </div>
                            <span class="text-lg font-bold text-green-600">Rp {{ number_format($minPrice, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-400 rounded-full mr-3"></div>
                                <span class="text-sm font-medium text-gray-700">Rata-rata</span>
                            </div>
                            <span class="text-lg font-bold text-blue-600">Rp {{ number_format($avgPrice, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>

    <!-- Grafik Harga -->
    @if ($komoditas->harga && $komoditas->harga->count())
    <section class="mt-12">
        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden hover:shadow-3xl transition-all duration-500">
            <div class="bg-gradient-to-r from-indigo-50 via-purple-50 to-pink-50 px-8 py-6 border-b border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                        </svg>
                    </div>
                    Grafik Pergerakan Harga
                </h3>
                <p class="text-gray-600 mt-2">Visualisasi tren harga {{ $komoditas->nama }} setiap bulan</p>
            </div>
            <div class="p-8 bg-gradient-to-br from-gray-50 to-white">
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                    <canvas id="priceChart" class="w-full" style="height: 450px;"></canvas>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if ($komoditas->harga && $komoditas->harga->count())
<script>
    const priceData = [
        @foreach($komoditas->harga as $harga)
        {
            bulan: '{{ $harga->bulan }}',
            harga: {{ $harga->harga }}
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
    ];

    const ctx = document.getElementById('priceChart').getContext('2d');
    const priceChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: priceData.map(item => item.bulan),
            datasets: [{
                label: 'Harga (Rp)',
                data: priceData.map(item => item.harga),
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 3,
                pointBackgroundColor: '#10b981',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Pergerakan Harga {{ $komoditas->nama }}',
                    font: { size: 16, weight: 'bold' },
                    color: '#374151'
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: { color: '#374151', font: { size: 12 } }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    ticks: {
                        callback: value => 'Rp ' + value.toLocaleString('id-ID'),
                        color: '#6b7280'
                    },
                    grid: { color: '#e5e7eb' },
                    title: {
                        display: true,
                        text: 'Harga (Rupiah)',
                        color: '#374151',
                        font: { size: 12, weight: 'bold' }
                    }
                },
                x: {
                    ticks: { color: '#6b7280' },
                    grid: { color: '#e5e7eb' },
                    title: {
                        display: true,
                        text: 'Bulan',
                        color: '#374151',
                        font: { size: 12, weight: 'bold' }
                    }
                }
            },
            interaction: { intersect: false, mode: 'index' }
        }
    });
</script>
@endif
@endpush