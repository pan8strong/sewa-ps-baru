<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <a href="{{ route('customers.index') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-100 transition">
                <h3 class="text-lg font-semibold mb-2">Total Pelanggan</h3>
                <p class="text-3xl font-bold">{{ $customerCount }}</p>
            </a>

            <a href="{{ route('rooms.index') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-100 transition">
                <h3 class="text-lg font-semibold mb-2">Total Ruang PS</h3>
                <p class="text-3xl font-bold">{{ $roomCount }}</p>
            </a>

            <a href="{{ route('rentals.index') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-100 transition">
                <h3 class="text-lg font-semibold mb-2">Total Peminjaman</h3>
                <p class="text-3xl font-bold">{{ $rentalCount }}</p>
            </a>

            <a href="{{ route('payments.index') }}" class="block bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-gray-100 transition">
                <h3 class="text-lg font-semibold mb-2">Total Pembayaran</h3>
                <p class="text-3xl font-bold">{{ $paymentCount }}</p>
            </a>

        </div>
    </div>
</x-app-layout>
