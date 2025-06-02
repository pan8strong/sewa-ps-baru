<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pembayaran</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="rental_id" class="block font-semibold mb-1">Peminjaman</label>
                    <select name="rental_id" id="rental_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
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

                <div class="mb-4">
                    <label for="amount_paid" class="block font-semibold mb-1">Jumlah Pembayaran (Rp)</label>
                    <input type="number" name="amount_paid" id="amount_paid" min="0" value="{{ old('amount_paid') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('amount_paid')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="paid_at" class="block font-semibold mb-1">Tanggal Pembayaran</label>
                    <input type="date" name="paid_at" id="paid_at" value="{{ old('paid_at') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('paid_at')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('payments.index') }}" class="ml-3 text-gray-700 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
