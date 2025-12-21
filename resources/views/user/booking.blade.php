<x-layouts.app title="Tiket Saya">
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl md:text-3xl font-bold text-white mb-8">Tiket Saya</h1>

        <div class="space-y-4">
            {{-- Booking 1: PAID --}}
            <div class="bg-[#16162a] rounded-xl overflow-hidden border border-white/10 hover:border-white/20 transition-colors">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-32 flex-shrink-0">
                        <img src="https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg" alt="Movie" class="w-full h-32 md:h-full object-cover">
                    </div>
                    <div class="flex-1 p-4 md:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <h3 class="font-semibold text-white">Avengers: Endgame</h3>
                                <p class="text-sm text-gray-400 mt-1">CGV Grand Indonesia</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-500/20 text-green-400">
                                Dibayar
                            </span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 text-sm">
                            <div>
                                <p class="text-gray-500">Tanggal</p>
                                <p class="text-white">21 Des 2024</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Jam</p>
                                <p class="text-white">19:30</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Kursi</p>
                                <p class="text-white">A1, A2</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Total</p>
                                <p class="text-white font-semibold">Rp 100.000</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-white/10">
                            <span class="text-sm text-gray-500 font-mono">BK-20241221-001</span>
                            <div class="flex-1"></div>
                            <a href="#" class="px-4 py-2 bg-[#e50914] text-white text-sm font-medium rounded-lg hover:opacity-90 transition-opacity">
                                Lihat E-Ticket
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Booking 2: PENDING --}}
            <div class="bg-[#16162a] rounded-xl overflow-hidden border border-white/10 hover:border-white/20 transition-colors">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-32 flex-shrink-0">
                        <img src="https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg" alt="Movie" class="w-full h-32 md:h-full object-cover">
                    </div>
                    <div class="flex-1 p-4 md:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <h3 class="font-semibold text-white">Spider-Man: No Way Home</h3>
                                <p class="text-sm text-gray-400 mt-1">XXI Pondok Indah</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-500/20 text-yellow-400">
                                Menunggu Bayar
                            </span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 text-sm">
                            <div>
                                <p class="text-gray-500">Tanggal</p>
                                <p class="text-white">22 Des 2024</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Jam</p>
                                <p class="text-white">14:00</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Kursi</p>
                                <p class="text-white">C3, C4, C5</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Total</p>
                                <p class="text-white font-semibold">Rp 150.000</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-white/10">
                            <span class="text-sm text-gray-500 font-mono">BK-20241222-002</span>
                            <div class="flex-1"></div>
                            <a href="#" class="px-4 py-2 bg-yellow-500 text-black text-sm font-medium rounded-lg hover:opacity-90 transition-opacity">
                                Bayar Sekarang
                            </a>
                            <button class="px-4 py-2 text-red-400 text-sm font-medium hover:text-red-300 transition-colors">
                                Batalkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Booking 3: CANCELLED --}}
            <div class="bg-[#16162a] rounded-xl overflow-hidden border border-white/10 hover:border-white/20 transition-colors">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-32 flex-shrink-0">
                        <img src="https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg" alt="Movie" class="w-full h-32 md:h-full object-cover">
                    </div>
                    <div class="flex-1 p-4 md:p-6">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <h3 class="font-semibold text-white">The Batman</h3>
                                <p class="text-sm text-gray-400 mt-1">Cinepolis Lippo Mall</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-red-500/20 text-red-400">
                                Dibatalkan
                            </span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 text-sm">
                            <div>
                                <p class="text-gray-500">Tanggal</p>
                                <p class="text-white">15 Des 2024</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Jam</p>
                                <p class="text-white">21:00</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Kursi</p>
                                <p class="text-white">B5</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Total</p>
                                <p class="text-white font-semibold">Rp 50.000</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-white/10">
                            <span class="text-sm text-gray-500 font-mono">BK-20241215-003</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>