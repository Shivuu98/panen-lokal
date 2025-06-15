@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Selamat Datang, Admin!</h1>
    <div class="grid md:grid-cols-3 gap-6">
        <a href="{{ url('/admin/komoditas') }}" class="bg-white rounded shadow p-6 hover:bg-green-50 transition text-center">
            <div class="text-3xl mb-2">🌾</div>
            <div class="font-semibold">Manajemen Komoditas</div>
        </a>
        <a href="{{ url('/admin/artikel') }}" class="bg-white rounded shadow p-6 hover:bg-green-50 transition text-center">
            <div class="text-3xl mb-2">📰</div>
            <div class="font-semibold">Manajemen Artikel</div>
        </a>
    </div>

@endsection
