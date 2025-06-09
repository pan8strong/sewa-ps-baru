<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-wide flex items-center gap-2">
            <svg class="w-7 h-7 text-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                <path d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm64 320l-64 0 0-64c35.3 0 64 28.7 64 64zM64 192l0-64 64 0c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64l0 64-64 0zm64-192c-35.3 0-64-28.7-64-64l64 0 0 64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
            </svg>
            Daftar Pembayaran
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('payments.create') }}" class="mb-6 inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-pink-700 text-white px-5 py-2 rounded-lg shadow hover:scale-105 hover:from-pink-600 hover:to-pink-800 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Pembayaran
        </a>

        <div class="bg-white shadow-xl rounded-2xl overflow-x-auto p-4">
            <table class="w-full table-auto border-collapse text-center">
                <thead>
                    <tr class="bg-gradient-to-r from-pink-100 to-pink-200 text-pink-800 font-semibold">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Peminjaman</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Tanggal Pembayaran</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $payment)
                        <tr class="hover:bg-pink-50 transition-colors duration-150">
                            <td class="px-4 py-2">{{ $payment->id }}</td>
                            <td class="px-4 py-2">Peminjaman #{{ $payment->rental->id ?? '-' }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $payment->paid_at }}</td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <a href="{{ route('payments.edit', $payment->id) }}" class="inline-flex items-center gap-1 bg-yellow-400 text-white px-3 py-1 rounded shadow hover:bg-yellow-500 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2H7v-2l8-8a2 2 0 1 1 2.828 2.828l-8 8z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Hapus data pembayaran ini?')" class="inline">
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
                                    <svg class="w-12 h-12 text-pink-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 15h8M9 10h.01M15 10h.01"/>
                                    </svg>
                                    Data pembayaran kosong
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $payments->links() }}
        </div>
    </div>
</x-app-layout>
