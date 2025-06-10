<header class="bg-green-600 text-white p-6 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold">Info Tani Lokal</a>
        <nav class="flex items-center space-x-4">
            <a href="{{ url('/') }}" class="font-bold hover:underline text-xl">Beranda</a>
            <a href="{{ url('/komoditas') }}" class="font-bold hover:underline text-xl">Komoditas</a>

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded text-white hover:bg-red-600 transition text-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ url('/login') }}" class="font-bold hover:underline text-xl">Login</a>
            @endauth
        </nav>
    </div>
</header>
