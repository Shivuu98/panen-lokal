<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center"
      style="background-image: url('{{ asset('images/background-sawah.jpeg') }}');">

    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login ke PanenLokal</h2>

        @if ($errors->any())
            <div class="text-red-500 mb-4">
                {{ $errors->first() }}
            </div>
        @endif

               <form method="POST" action="/login" class="space-y-4">
            @csrf
            <div>
                <label class="block">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block">Password</label>
                <input type="password" name="password" class="w-full border p-2 rounded" required>
            </div>
            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Login</button>
        </form>

        <div class="flex flex-col space-y-4 mt-4">
            <a href="{{ url('/') }}" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition text-center">
                Masuk Sebagai Tamu
            </a>
            <p class="text-sm text-center text-gray-700">
                Belum punya akun?
                <a href="/register" class="text-blue-600 underline">Daftar di sini</a>
            </p>
        </div>
</body>
</html>
