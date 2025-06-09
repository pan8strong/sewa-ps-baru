<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-wide flex items-center gap-2">
            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Peminjaman PS
        </h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl rounded-2xl p-8">
            <form action="{{ route('rentals.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="customer_id" class="block font-semibold mb-2 text-gray-700">Pelanggan</label>
                    <select name="customer_id" id="customer_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-400" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="room_id" class="block font-semibold mb-2 text-gray-700">Ruang PS</label>
                    <select name="room_id" id="room_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-400" required>
                        <option value="">-- Pilih Ruang --</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="start_time" class="block font-semibold mb-2 text-gray-700">Waktu Mulai</label>
                    <input type="datetime-local" name="start_time" id="start_time" value="{{ old('start_time') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-400" required>
                    @error('start_time')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="end_time" class="block font-semibold mb-2 text-gray-700">Waktu Selesai</label>
                    <input type="datetime-local" name="end_time" id="end_time" value="{{ old('end_time') }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-400" required>
                    @error('end_time')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-2 rounded-lg shadow hover:scale-105 hover:from-green-600 hover:to-green-800 transition-all duration-200 font-semibold">
                        Simpan
                    </button>
                    <a href="{{ route('rentals.index') }}" class="text-gray-600 hover:underline hover:text-green-600 transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
