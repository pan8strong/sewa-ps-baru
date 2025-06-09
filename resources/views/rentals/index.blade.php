<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-wide flex items-center gap-2">
        <svg class="w-7 h-7 text-purple-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor">
            <path d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/>
        </svg>
        Daftar Peminjaman PS
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('rentals.create') }}" class="mb-6 inline-flex items-center gap-2 bg-gradient-to-r from-purple-400 to-purple-600 text-white px-5 py-2 rounded-lg shadow hover:scale-105 hover:from-purple-500 hover:to-purple-700 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Peminjaman
        </a>

        <div class="bg-white shadow-xl rounded-2xl overflow-x-auto p-4">
            <table class="w-full table-auto border-collapse text-center">
                <thead>
                    <tr class="bg-purple-200 text-purple-800 font-semibold">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Pelanggan</th>
                        <th class="px-4 py-3">Ruang</th>
                        <th class="px-4 py-3">Waktu Mulai</th>
                        <th class="px-4 py-3">Waktu Selesai</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rentals as $rental)
                        <tr class="hover:bg-purple-50 transition-colors duration-150">
                            <td class="px-4 py-2">{{ $rental->id }}</td>
                            <td class="px-4 py-2">{{ $rental->customer->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $rental->room->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $rental->start_time }}</td>
                            <td class="px-4 py-2">{{ $rental->end_time }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                    {{ $rental->status === 'completed' ? 'bg-green-100 text-green-700' : ($rental->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <a href="{{ route('rentals.edit', $rental->id) }}" class="inline-flex items-center gap-1 bg-yellow-400 text-white px-3 py-1 rounded shadow hover:bg-yellow-500 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2H7v-2l8-8a2 2 0 1 1 2.828 2.828l-8 8z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" onsubmit="return confirm('Hapus data peminjaman ini?')" class="inline">
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
                            <td colspan="7" class="py-10 text-gray-400">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-12 h-12 text-purple-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 15h8M9 10h.01M15 10h.01"/>
                                    </svg>
                                    Data peminjaman kosong
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $rentals->links() }}
        </div>
    </div>
</x-app-layout>
