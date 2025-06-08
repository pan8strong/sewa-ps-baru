<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <a href="{{ route('customers.index') }}" class="block bg-gradient-to-br from-blue-400 to-blue-600 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-200 text-white">
                <div class="flex items-center mb-2">
                    <svg class="w-8 h-8 mr-3 text-white/80" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 8L36 44L52 52L32 56L12 52L28 44L32 8Z" fill="currentColor" opacity="0.8"/>
                        <ellipse cx="32" cy="56" rx="20" ry="4" fill="currentColor" opacity="0.2"/>
                    </svg>
                    <h3 class="text-lg font-semibold">Total Pelanggan</h3>
                </div>
                <p class="text-4xl font-extrabold">{{ $customerCount }}</p>
            </a>

            <a href="{{ route('rooms.index') }}" class="block bg-gradient-to-br from-green-400 to-green-600 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-200 text-white">
                <div class="flex items-center mb-2">
                    <svg class="w-8 h-8 mr-3 text-white/80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 7v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7"></path>
                        <rect width="18" height="10" x="3" y="7" rx="2"></rect>
                    </svg>
                    <h3 class="text-lg font-semibold">Total Ruang PS</h3>
                </div>
                <p class="text-4xl font-extrabold">{{ $roomCount }}</p>
            </a>

            <a href="{{ route('rentals.index') }}" class="block bg-gradient-to-br from-purple-400 to-purple-600 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-200 text-white">
                <div class="flex items-center mb-2">
                    <svg class="w-8 h-8 mr-3 text-white/80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M8 17l4 4 4-4m-4-5v9"></path>
                        <rect width="20" height="8" x="2" y="4" rx="2"></rect>
                    </svg>
                    <h3 class="text-lg font-semibold">Total Peminjaman</h3>
                </div>
                <p class="text-4xl font-extrabold">{{ $rentalCount }}</p>
            </a>

            <a href="{{ route('payments.index') }}" class="block bg-gradient-to-br from-pink-400 to-pink-600 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-200 text-white">
                <div class="flex items-center mb-2">
                    <svg class="w-8 h-8 mr-3 text-white/80" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 10c-4.41 0-8-1.79-8-4V6c0-2.21 3.59-4 8-4s8 1.79 8 4v8c0 2.21-3.59 4-8 4z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold">Total Pembayaran</h3>
                </div>
                <p class="text-4xl font-extrabold">{{ $paymentCount }}</p>
            </a>

        </div>
    </div>
</x-app-layout>
