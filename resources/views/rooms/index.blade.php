<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ruang PS</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a href="{{ route('rooms.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Ruang PS
        </a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Harga per jam</th>
                        <th class="border border-gray-300 px-4 py-2">Tersedia</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $room->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $room->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $room->hourly_rate}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                {{ $room->is_available ? 'Ya' : 'Tidak' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 flex gap-2">
                                <a href="{{ route('rooms.edit', $room->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Hapus ruang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($rooms->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-4">Data ruang kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $rooms->links() }}
        </div>

    </div>
</x-app-layout>

