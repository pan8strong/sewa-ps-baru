<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Pembayaran</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('payments.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Tambah Pembayaran</a>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Peminjaman</th>
                        <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal Pembayaran</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $payment->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">Peminjaman #{{ $payment->rental->id ?? '-' }}</td>
                            <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($payment->amount_paid, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $payment->paid_at }}</td>
                            <td class="border border-gray-300 px-4 py-2 flex gap-2">
                                <a href="{{ route('payments.edit', $payment->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('Hapus data pembayaran ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($payments->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4">Data pembayaran kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $payments->links() }}
        </div>
    </div>
</x-app-layout>
