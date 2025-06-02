<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Ruang PS</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block font-semibold mb-1">Nama Ruang</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block font-semibold mb-1">Status</label>
                    <select name="status" id="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                        <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                    @error('status')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="hourly_rate" class="block font-semibold mb-1">Harga Per Jam</label>
                    <input type="number" name="hourly_rate" id="hourly_rate" step="0.01" min="0" value="{{ old('hourly_rate') }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('hourly_rate')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('rooms.index') }}" class="ml-3 text-gray-700 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
