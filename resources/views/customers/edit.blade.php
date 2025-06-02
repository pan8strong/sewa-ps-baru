<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pelanggan</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block font-semibold mb-1">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block font-semibold mb-1">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    @error('phone')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
                    <a href="{{ route('customers.index') }}" class="ml-3 text-gray-700 hover:underline">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
