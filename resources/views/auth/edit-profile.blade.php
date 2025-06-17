@extends('layouts.app')

@section('content')
<div class="max-w-md  mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Edit Profil</h1>
    @if(session('success'))
        <div class="mb-4 text-green-700">{{ session('success') }}</div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Username</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $user->name }}" required>
        </div>
        <div>
            <label class="block mb-1">Password Baru (opsional)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block mb-1">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Profil</button>
    </form>
</div>
@endsection
