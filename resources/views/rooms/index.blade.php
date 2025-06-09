<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-wide flex items-center gap-2">
            <svg class="w-7 h-7 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
            <path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5L64 448l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0 192 0 32 0 0-32 0-448zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128l96 0 0 352c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0 0-320c0-35.3-28.7-64-64-64l-96 0 0 64z"/>
            </svg>
            Ruang PS
        </h2>
    </x-slot>   

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('rooms.create') }}" class="mb-6 inline-flex items-center gap-2 bg-gradient-to-r from-green-400 to-green-600 text-white px-5 py-2 rounded-lg shadow hover:scale-105 hover:from-green-500 hover:to-green-700 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Ruang PS
        </a>

        <div class="bg-white shadow-xl rounded-2xl overflow-x-auto p-4">
            <table class="w-full table-auto border-collapse text-center">
                <thead>
                    <tr class="bg-green-200 text-green-800 font-semibold">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Harga per jam</th>
                        <th class="px-4 py-3">Tersedia</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                        <tr class="hover:bg-green-50 transition-colors duration-150">
                            <td class="px-4 py-2">{{ $room->id }}</td>
                            <td class="px-4 py-2">{{ $room->name }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($room->hourly_rate, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">
                                @if($room->is_available)
                                    <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Ya</span>
                                @else
                                    <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">Tidak</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <a href="{{ route('rooms.edit', $room->id) }}" class="inline-flex items-center gap-1 bg-yellow-400 text-white px-3 py-1 rounded shadow hover:bg-yellow-500 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2H7v-2l8-8a2 2 0 1 1 2.828 2.828l-8 8z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Hapus ruang ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded shadow hover:bg-red-600 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10 text-gray-400">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-12 h-12 text-green-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 15h8M9 10h.01M15 10h.01"/>
                                    </svg>
                                    Data ruang kosong
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $rooms->links() }}
        </div>
    </div>
</x-app-layout>

