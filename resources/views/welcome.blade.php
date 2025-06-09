<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | {{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-500 via-purple-400 to-indigo-300">

    <div class="w-full max-w-md mx-auto mt-12 bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
        {{-- Logo PlayStation --}}
        <div class="mb-6">
            <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                <path d="M20 48V16c0-2.21 1.79-4 4-4h4c2.21 0 4 1.79 4 4v28c0 2.21-1.79 4-4 4h-4c-2.21 0-4-1.79-4-4z" fill="#003087"/>
                <path d="M36 44c0-2.21 1.79-4 4-4h4c2.21 0 4 1.79 4 4v4c0 2.21-1.79 4-4 4h-4c-2.21 0-4-1.79-4-4v-4z" fill="#0099D6"/>
                <ellipse cx="32" cy="56" rx="20" ry="4" fill="#003087" opacity="0.2"/>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang di {{ config('app.name', 'Laravel') }}</h1>
        <p class="text-gray-600 mb-6 text-center">
            Sistem Peminjaman Ruang PlayStation<br>
            Silakan login untuk mulai menggunakan aplikasi.
        </p>
        <div class="flex gap-4 w-full justify-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow font-semibold transition">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded shadow font-semibold transition">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <footer class="mt-8 text-gray-400 text-xs">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>
</body>
</html>
