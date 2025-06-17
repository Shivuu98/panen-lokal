@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-14 px-6">
    <div class="bg-white border border-gray-200 shadow-xl rounded-2xl p-8 relative overflow-hidden">

        <!-- Avatar/Ilustrasi Heading -->
        <div class="flex items-center justify-center mb-6">
            <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center text-green-600 text-4xl shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-1">Edit Profil Anda</h1>
        <p class="text-sm text-gray-500 text-center mb-6">Perbarui informasi akun agar tetap up-to-date</p>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-800 text-sm px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-5 animate-fade-in">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input 
                    type="text" 
                    name="name" 
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition text-sm"
                    value="{{ $user->name }}" 
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru <span class="text-gray-400 text-xs">(Opsional)</span></label>
                <input 
                    type="password" 
                    name="password" 
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 transition text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 transition text-sm">
            </div>

            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 rounded-xl transition shadow hover:shadow-lg">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
