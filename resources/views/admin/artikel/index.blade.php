@extends('admin.layout')

@section('content')
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Manajemen Artikel</h1>
        <a href="{{ route('admin.artikel.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-4 inline-block">+ Tambah Artikel</a>
        @if(session('success'))
            <div class="mb-4 text-green-700">{{ session('success') }}</div>
        @endif
        <table class="w-full bg-white rounded shadow text-left">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Penulis</th>
                    <th class="py-2 px-4 border-b">Tanggal</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artikels as $artikel)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $artikel->judul }}</td>
                    <td class="py-2 px-4 border-b">{{ $artikel->penulis ?? 'Admin' }}</td>
                    <td class="py-2 px-4 border-b">{{ $artikel->created_at->format('d M Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.artikel.edit', $artikel) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $artikels->links() }}
        </div>
    </div>
@endsection
