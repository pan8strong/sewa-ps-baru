<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-wide">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10 min-h-screen bg-gradient-to-br from-blue-50 via-purple-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Card Pelanggan -->
                <a href="{{ route('customers.index') }}"
                   class="group block bg-gradient-to-br from-blue-500 via-blue-400 to-blue-700/90 shadow-2xl rounded-3xl p-8 hover:scale-105 hover:shadow-blue-400/60 transition-all duration-300 text-white relative overflow-hidden backdrop-blur-md border border-blue-200/30">
                    <div class="flex items-center mb-4 relative">
                        <div class="absolute -top-3 -right-3">
                            <span class="bg-green-400 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg animate-bounce">New</span>
                        </div>
                        <div class="bg-white/20 rounded-full p-2 shadow-xl transition-transform group-hover:-translate-y-2 group-hover:scale-110 duration-300">
                            <svg class="w-14 h-14 text-white/90 drop-shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor">
                            <path d="M211.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM32 256c0 17.7 14.3 32 32 32l85.6 0c10.1-39.4 38.6-71.5 75.8-86.6c-9.7-6-21.2-9.4-33.4-9.4l-96 0c-35.3 0-64 28.7-64 64zm461.6 32l82.4 0c17.7 0 32-14.3 32-32c0-35.3-28.7-64-64-64l-96 0c-11.7 0-22.7 3.1-32.1 8.6c38.1 14.8 67.4 47.3 77.7 87.4zM391.2 226.4c-6.9-1.6-14.2-2.4-21.6-2.4l-96 0c-8.5 0-16.7 1.1-24.5 3.1c-30.8 8.1-55.6 31.1-66.1 60.9c-3.5 10-5.5 20.8-5.5 32c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32c0-11.2-1.9-22-5.5-32c-10.8-30.7-36.8-54.2-68.9-61.6zM563.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM321.6 192a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 416z"/>
                        </svg>
                        </div>
                        <h3 class="text-lg font-semibold tracking-wide ml-4">Total Pelanggan</h3>
                    </div>
                    <p class="text-5xl font-extrabold group-hover:scale-110 transition-transform duration-200 drop-shadow-lg">{{ $customerCount }}</p>
                </a>

                <!-- Card Ruang PS -->
                <a href="{{ route('rooms.index') }}"
                   class="group block bg-gradient-to-br from-green-400 via-green-500 to-green-600/90 shadow-2xl rounded-3xl p-8 hover:scale-105 hover:shadow-green-400/60 transition-all duration-300 text-white relative overflow-hidden backdrop-blur-md border border-green-200/30">
                    <div class="flex items-center mb-4">
                        <div class="bg-white/20 rounded-full p-2 shadow-xl transition-transform group-hover:-translate-y-2 group-hover:scale-110 duration-300">
                        <svg class="w-14 h-14 text-white/90 drop-shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                        <path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5L64 448l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0 192 0 32 0 0-32 0-448zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128l96 0 0 352c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0 0-320c0-35.3-28.7-64-64-64l-96 0 0 64z"/>
                        </svg>
                        </div>
                        <h3 class="text-lg font-semibold tracking-wide ml-4">Total Ruang PS</h3>
                    </div>
                    <p class="text-5xl font-extrabold group-hover:scale-110 transition-transform duration-200 drop-shadow-lg">{{ $roomCount }}</p>
                </a>

                <!-- Card Peminjaman -->
                <a href="{{ route('rentals.index') }}"
                   class="group block bg-gradient-to-br from-purple-400 via-purple-500 to-purple-600/90 shadow-2xl rounded-3xl p-8 hover:scale-105 hover:shadow-purple-400/60 transition-all duration-300 text-white relative overflow-hidden backdrop-blur-md border border-purple-200/30">
                    <div class="flex items-center mb-4">
                        <div class="bg-white/20 rounded-full p-2 shadow-xl transition-transform group-hover:-translate-y-2 group-hover:scale-110 duration-300">
                            <svg class="w-14 h-14 text-white/90 drop-shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor">
                            <path d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold tracking-wide ml-4">Total Peminjaman</h3>
                    </div>
                    <p class="text-5xl font-extrabold group-hover:scale-110 transition-transform duration-200 drop-shadow-lg">{{ $rentalCount }}</p>
                </a>

                <!-- Card Pembayaran -->
                <a href="{{ route('payments.index') }}"
                   class="group block bg-gradient-to-br from-pink-400 via-pink-500 to-pink-600/90 shadow-2xl rounded-3xl p-8 hover:scale-105 hover:shadow-pink-400/60 transition-all duration-300 text-white relative overflow-hidden backdrop-blur-md border border-pink-200/30">
                    <div class="flex items-center mb-4">
                    <div class="bg-white/20 rounded-full p-2 shadow-xl border border-pink-200/30 transition-transform group-hover:-translate-y-2 group-hover:scale-110 duration-300">
                        <svg class="w-14 h-14 text-white/90 drop-shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                        <path d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm64 320l-64 0 0-64c35.3 0 64 28.7 64 64zM64 192l0-64 64 0c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64l0 64-64 0zm64-192c-35.3 0-64-28.7-64-64l64 0 0 64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
                        </svg>
                    </div>
                        <h3 class="text-lg font-semibold tracking-wide ml-4">Total Pembayaran</h3>
                    </div>
                    <p class="text-5xl font-extrabold group-hover:scale-110 transition-transform duration-200 drop-shadow-lg">{{ $paymentCount }}</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>