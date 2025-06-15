@extends('admin.layout')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Tambah Artikel</h1>
        <form action="{{ route('admin.artikel.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1">Judul</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block mb-1">Isi</label>
                <textarea name="isi" rows="6" class="w-full border p-2 rounded" required></textarea>
            </div>
            <div>
                <label class="block mb-1">Penulis</label>
                <input type="text" name="penulis" class="w-full border p-2 rounded">
            </div>
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            <a href="{{ route('admin.artikel.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
@endsection
