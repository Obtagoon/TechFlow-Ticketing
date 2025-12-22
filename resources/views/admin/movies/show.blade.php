<x-layouts.admin title="Detail Film">
<div class="max-w-4xl">
    <a href="/admin/movies" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <!-- Backdrop -->
    <div class="relative h-48 rounded-xl overflow-hidden mb-6">
        <img src="https://image.tmdb.org/t/p/w1280/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1a] to-transparent"></div>
    </div>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Detail Film</h2>
            <span class="px-3 py-1 text-sm rounded-full bg-green-500/20 text-green-400">
                Sedang Tayang
            </span>
        </div>

        <div class="p-6 space-y-6">
            <!-- Movie Info -->
            <div class="flex gap-6">
                <img src="https://image.tmdb.org/t/p/w200/or06FN3Dka5tuj1yVnS3m7PBNKy.jpg" alt="Avengers: Endgame" class="w-40 h-56 object-cover rounded-xl shadow-lg">
                <div class="flex-1 space-y-4">
                    <div>
                        <h3 class="text-2xl font-bold text-white">Avengers: Endgame</h3>
                        <p class="text-gray-400 mt-1">Action, Adventure, Drama</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500 text-sm">Durasi</p>
                            <p class="text-white">181 menit</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Rating</p>
                            <p class="text-white flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                8.4
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Tanggal Rilis</p>
                            <p class="text-white">26 Apr 2019</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">TMDB ID</p>
                            <p class="text-white">299534</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-white/10">
            <div>
                <h3 class="font-medium text-white mb-2">Sinopsis</h3>
                <p class="text-gray-400 leading-relaxed">After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.</p>
            </div>

            <hr class="border-white/10">

            <!-- Upcoming Showtimes -->
            <div>
                <h3 class="font-medium text-white mb-4">Jadwal Tayang Mendatang (3)</h3>
                <div class="grid gap-3">
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5 flex items-center justify-between">
                        <div>
                            <p class="text-white font-medium">Cinema XXI Gandaria City - Studio 3</p>
                            <p class="text-gray-500 text-sm">Minggu, 22 Des 2024 • 14:30</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[#e50914] font-bold">Rp 50.000</p>
                            <p class="text-gray-500 text-xs">Regular</p>
                        </div>
                    </div>
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5 flex items-center justify-between">
                        <div>
                            <p class="text-white font-medium">Cinema XXI Gandaria City - Studio 5</p>
                            <p class="text-gray-500 text-sm">Minggu, 22 Des 2024 • 17:00</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[#e50914] font-bold">Rp 75.000</p>
                            <p class="text-gray-500 text-xs">IMAX</p>
                        </div>
                    </div>
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5 flex items-center justify-between">
                        <div>
                            <p class="text-white font-medium">CGV Grand Indonesia - Velvet</p>
                            <p class="text-gray-500 text-sm">Senin, 23 Des 2024 • 19:30</p>
                        </div>
                        <div class="text-right">
                            <p class="text-[#e50914] font-bold">Rp 100.000</p>
                            <p class="text-gray-500 text-xs">Premiere</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-4 border-t border-white/10">
                <a href="/admin/movies/1/edit" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white rounded-lg hover:opacity-90">
                    Edit Film
                </a>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-90">
                    Hapus Film
                </button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>