<x-layouts.admin title="Detail Studio">
<div class="max-w-4xl">
    <a href="/admin/studios" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-white">Studio 1</h2>
                <p class="text-gray-500 text-sm">Cinema XXI Gandaria City</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-purple-500/20 text-purple-400 text-sm rounded-full">Regular 2D</span>
                <span class="px-3 py-1 bg-green-500/20 text-green-400 text-sm rounded-full">Aktif</span>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <!-- Studio Info -->
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                    <p class="text-gray-500 text-sm">Kapasitas</p>
                    <p class="text-white text-xl font-bold">150 kursi</p>
                </div>
                <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                    <p class="text-gray-500 text-sm">Konfigurasi</p>
                    <p class="text-white text-xl font-bold">10 x 15</p>
                </div>
                <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                    <p class="text-gray-500 text-sm">Total Kursi</p>
                    <p class="text-white text-xl font-bold">150</p>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Seat Layout -->
            <div>
                <h3 class="font-medium text-white mb-4">Denah Kursi</h3>
                <div class="bg-[#0f0f1a] rounded-lg p-6 border border-white/5">
                    <!-- Screen -->
                    <div class="text-center mb-6">
                        <div class="bg-gradient-to-b from-white/20 to-transparent h-2 rounded-t-full max-w-md mx-auto"></div>
                        <p class="text-gray-500 text-xs mt-2">LAYAR</p>
                    </div>

                    <!-- Seats Preview -->
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex items-center gap-2">
                            <span class="w-6 text-gray-500 text-sm text-center">A</span>
                            <div class="flex gap-1">
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">1</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">2</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">3</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">4</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">5</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-red-500/20 text-red-400">6</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">7</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">8</div>
                            </div>
                            <span class="w-6 text-gray-500 text-sm text-center">A</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-6 text-gray-500 text-sm text-center">B</span>
                            <div class="flex gap-1">
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">1</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">2</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">3</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">4</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">5</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">6</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">7</div>
                                <div class="w-6 h-6 rounded text-xs flex items-center justify-center bg-white/10 text-gray-400">8</div>
                            </div>
                            <span class="w-6 text-gray-500 text-sm text-center">B</span>
                        </div>
                        <p class="text-gray-500 text-xs mt-2">... dan seterusnya</p>
                    </div>

                    <!-- Legend -->
                    <div class="flex items-center justify-center gap-6 mt-6 pt-4 border-t border-white/5">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-white/10 rounded"></div>
                            <span class="text-gray-500 text-xs">Aktif</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-500/20 rounded"></div>
                            <span class="text-gray-500 text-xs">Nonaktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Upcoming Showtimes -->
            <div>
                <h3 class="font-medium text-white mb-4">Jadwal Tayang Mendatang (2)</h3>
                <div class="grid gap-3">
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="https://image.tmdb.org/t/p/w92/or06FN3Dka5tuj1yVnS3m7PBNKy.jpg" alt="" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">Avengers: Endgame</p>
                                <p class="text-gray-500 text-sm">Minggu, 22 Des 2024 • 14:30</p>
                            </div>
                        </div>
                        <p class="text-[#e50914] font-bold">Rp 50.000</p>
                    </div>
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="https://image.tmdb.org/t/p/w92/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg" alt="" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">Spider-Man: No Way Home</p>
                                <p class="text-gray-500 text-sm">Minggu, 22 Des 2024 • 17:00</p>
                            </div>
                        </div>
                        <p class="text-[#e50914] font-bold">Rp 50.000</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-4 border-t border-white/10">
                <a href="/admin/studios/1/edit" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white rounded-lg hover:opacity-90">
                    Edit Studio
                </a>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-90">
                    Hapus Studio
                </button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>