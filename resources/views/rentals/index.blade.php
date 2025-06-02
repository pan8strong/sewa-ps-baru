<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Peminjaman PS</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('rentals.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Tambah Peminjaman</a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Customer</th>
                        <th class="border border-gray-300 px-4 py-2">Room</th>
                        <th class="border border-gray-300 px-4 py-2">Waktu Mulai</th>
                        <th class="border border-gray-300 px-4 py-2">Waktu Selesai</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $rental->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $rental->customer->name ?? '-' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $rental->room->name ?? '-' }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $rental->start_time }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $rental->end_time }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $rental->status }}</td>
                            <td class="border border-gray-300 px-4 py-2 flex gap-2">
                                <a href="{{ route('rentals.edit', $rental->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" onsubmit="return confirm('Hapus data peminjaman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($rentals->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4">Data peminjaman kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $rentals->links() }}
        </div>
    </div>
</x-app-layout>
