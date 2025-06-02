<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Peminjaman PS</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('rentals.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="customer_id" class="block font-semibold mb-1">Pelanggan</label>
                    <select name="customer_id" id="customer_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="room_id" class="block font-semibold mb-1">Ruang PS</label>
                    <select name="room_id" id="room_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Pilih Ruang --</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="start_time" class="block font-semibold mb-1">Waktu Mulai</label>
                    <input type="datetime-local" name="start_time" id="start_time" value="{{ old('start_time') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('start_time')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="end_time" class="block font-semibold mb-1">Waktu Selesai</label>
                    <input type="datetime-local" name="end_time" id="end_time" value="{{ old('end_time') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('end_time')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('rentals.index') }}" class="ml-3 text-gray-700 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
