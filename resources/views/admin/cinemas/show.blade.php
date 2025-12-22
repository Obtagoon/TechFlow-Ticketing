<x-layouts.admin title="Detail Bioskop">
<div class="max-w-4xl">
    <a href="/admin/cinemas" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Detail Bioskop</h2>
            <span class="px-3 py-1 bg-green-500/20 text-green-400 text-sm rounded-full">Aktif</span>
        </div>

        <div class="p-6 space-y-6">
            <!-- Cinema Info -->
            <div class="flex gap-6">
                <div class="w-32 h-32 bg-white/10 rounded-xl flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div class="space-y-3">
                    <h3 class="text-xl font-bold text-white">Cinema XXI Gandaria City</h3>
                    <div class="space-y-1">
                        <p class="text-gray-400 text-sm">
                            <span class="text-gray-500">Kota:</span> Jakarta Selatan
                        </p>
                        <p class="text-gray-400 text-sm">
                            <span class="text-gray-500">Alamat:</span> Jl. Sultan Iskandar Muda, Gandaria City Mall Lt. 3
                        </p>
                        <p class="text-gray-400 text-sm">
                            <span class="text-gray-500">Telepon:</span> 021-29529021
                        </p>
                    </div>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Studios -->
            <div>
                <h3 class="font-medium text-white mb-4">Studio (5)</h3>
                <div class="grid gap-4">
                    <!-- Studio 1 -->
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <p class="text-white font-medium">Studio 1</p>
                                <p class="text-gray-500 text-sm">Regular • 150 kursi</p>
                            </div>
                            <a href="/admin/studios/1/edit" class="text-[#e50914] hover:underline text-sm">
                                Edit
                            </a>
                        </div>
                        <div class="mt-3 pt-3 border-t border-white/5">
                            <p class="text-gray-500 text-xs mb-2">Jadwal Tayang Mendatang:</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-white/5 rounded text-xs text-gray-300">
                                    Avengers: Endgame - 22/12 14:30
                                </span>
                                <span class="px-2 py-1 bg-white/5 rounded text-xs text-gray-300">
                                    Spider-Man - 22/12 17:00
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Studio 2 -->
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <p class="text-white font-medium">Studio 2</p>
                                <p class="text-gray-500 text-sm">Regular • 120 kursi</p>
                            </div>
                            <a href="/admin/studios/2/edit" class="text-[#e50914] hover:underline text-sm">
                                Edit
                            </a>
                        </div>
                        <p class="text-gray-500 text-xs mt-2">Tidak ada jadwal tayang mendatang</p>
                    </div>
                    
                    <!-- Studio 3 -->
                    <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <p class="text-white font-medium">Studio 3</p>
                                <p class="text-gray-500 text-sm">IMAX • 200 kursi</p>
                            </div>
                            <a href="/admin/studios/3/edit" class="text-[#e50914] hover:underline text-sm">
                                Edit
                            </a>
                        </div>
                        <div class="mt-3 pt-3 border-t border-white/5">
                            <p class="text-gray-500 text-xs mb-2">Jadwal Tayang Mendatang:</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-white/5 rounded text-xs text-gray-300">
                                    Dune: Part Two - 23/12 19:30
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-4 border-t border-white/10">
                <a href="/admin/cinemas/1/edit" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white rounded-lg hover:opacity-90">
                    Edit Bioskop
                </a>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-90">
                    Hapus Bioskop
                </button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>