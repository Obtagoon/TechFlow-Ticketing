<x-layouts.admin title="Kelola Jadwal Tayang">
<div class="flex items-center justify-between mb-6">
    <a href="/admin/showtimes/create" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
        + Tambah Jadwal
    </a>
</div>

<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="flex flex-wrap items-center gap-4">
        <select name="movie_id" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Film</option>
            <option value="1">Avengers: Endgame</option>
            <option value="2">Spider-Man: No Way Home</option>
            <option value="3">Dune: Part Two</option>
        </select>
        <select name="cinema_id" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Bioskop</option>
            <option value="1">Cinema XXI Gandaria City</option>
            <option value="2">CGV Grand Indonesia</option>
        </select>
        <input type="date" name="date" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
    </form>
</div>

<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                    <th class="px-6 py-4 font-medium">Film</th>
                    <th class="px-6 py-4 font-medium">Bioskop</th>
                    <th class="px-6 py-4 font-medium">Studio</th>
                    <th class="px-6 py-4 font-medium">Tanggal</th>
                    <th class="px-6 py-4 font-medium">Jam</th>
                    <th class="px-6 py-4 font-medium">Harga</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <!-- Jadwal 1 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white">Avengers: Endgame</td>
                    <td class="px-6 py-4 text-gray-300">Cinema XXI Gandaria City</td>
                    <td class="px-6 py-4 text-gray-300">Studio 1</td>
                    <td class="px-6 py-4 text-gray-300">22 Des 2024</td>
                    <td class="px-6 py-4 text-white font-medium">14:30</td>
                    <td class="px-6 py-4 text-gray-300">Rp 50.000</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/showtimes/1/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Jadwal 2 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white">Spider-Man: No Way Home</td>
                    <td class="px-6 py-4 text-gray-300">Cinema XXI Gandaria City</td>
                    <td class="px-6 py-4 text-gray-300">Studio 2</td>
                    <td class="px-6 py-4 text-gray-300">22 Des 2024</td>
                    <td class="px-6 py-4 text-white font-medium">17:00</td>
                    <td class="px-6 py-4 text-gray-300">Rp 50.000</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/showtimes/2/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Jadwal 3 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white">Dune: Part Two</td>
                    <td class="px-6 py-4 text-gray-300">Cinema XXI Gandaria City</td>
                    <td class="px-6 py-4 text-gray-300">Studio 3 (IMAX)</td>
                    <td class="px-6 py-4 text-gray-300">23 Des 2024</td>
                    <td class="px-6 py-4 text-white font-medium">19:30</td>
                    <td class="px-6 py-4 text-gray-300">Rp 75.000</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/showtimes/3/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Jadwal 4 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 text-white">Oppenheimer</td>
                    <td class="px-6 py-4 text-gray-300">CGV Grand Indonesia</td>
                    <td class="px-6 py-4 text-gray-300">Velvet (Premiere)</td>
                    <td class="px-6 py-4 text-gray-300">23 Des 2024</td>
                    <td class="px-6 py-4 text-white font-medium">20:00</td>
                    <td class="px-6 py-4 text-gray-300">Rp 100.000</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/showtimes/4/edit" class="p-2 text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-white/10">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-400">Menampilkan 1 - 4 dari 4 jadwal</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 bg-[#e50914] rounded text-white">1</button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>