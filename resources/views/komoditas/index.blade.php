@extends('layout')

@section('content')

    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Daftar Komoditas</h2>

        <div class="mb-6 flex justify-end">
            <form method="GET" action="{{ url('/komoditas') }}" class="flex items-center gap-2">
                <label for="daerah" class="font-semibold">Filter Daerah:</label>
                <select name="daerah" id="daerah" onchange="this.form.submit()" class="border p-2 rounded">
                    <option value="">Semua Daerah</option>
                    @foreach($daerahList as $daerah)
                        <option value="{{ $daerah }}" {{ request('daerah') == $daerah ? 'selected' : '' }}>{{ $daerah }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($komoditas as $item)
                <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2">{{ $item->nama }}</h3>
                    <p class="text-green-700 mb-1">
                        Daerah: {{ $item->daerah }}
                    </p>
                    <p class="text-gray-600 mb-1">
                        Musim Panen: {{ implode(', ', $item->musimPanen->pluck('bulan')->toArray()) }}
                    </p>
                    <a href="{{ url('/komoditas/' . $item->id) }}" class="text-green-600 hover:underline mt-2 inline-block">
                        Lihat Detail Harga
                    </a>
                </div>
            @endforeach
        </div>
    </main>

@endsection
