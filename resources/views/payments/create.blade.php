<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-wide flex items-center gap-2">
            <svg class="w-7 h-7 text-pink-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Pembayaran
        </h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-2xl p-8">
            <form action="{{ route('payments.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="rental_id" class="block font-semibold mb-2 text-gray-700">Peminjaman</label>
                    <select name="rental_id" id="rental_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-pink-400" required>
                        <option value="">-- Pilih Peminjaman --</option>
                        @foreach ($rentals as $rental)
                            <option value="{{ $rental->id }}" {{ old('rental_id') == $rental->id ? 'selected' : '' }}>
                                #{{ $rental->id }} - {{ $rental->customer->name ?? '-' }} - {{ $rental->room->name ?? '-' }}
                            </option>
                        @endforeach
                    </select>
                    @error('rental_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="amount_paid" class="block font-semibold mb-2 text-gray-700">Jumlah Pembayaran (Rp)</label>
                    <input type="number" name="amount_paid" id="amount_paid" min="0" value="{{ old('amount_paid') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-pink-400" required>
                    @error('amount_paid')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="paid_at" class="block font-semibold mb-2 text-gray-700">Tanggal Pembayaran</label>
                    <input type="date" name="paid_at" id="paid_at" value="{{ old('paid_at') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-pink-400" required>
                    @error('paid_at')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg shadow font-semibold transition">
                        Simpan
                    </button>
                    <a href="{{ route('payments.index') }}" class="text-gray-600 hover:underline hover:text-pink-600 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
