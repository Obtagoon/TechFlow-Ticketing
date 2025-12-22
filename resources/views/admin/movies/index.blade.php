<x-layouts.admin title="Kelola Film">
<!-- Header -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-4">
        <a href="/admin/movies/create" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
            + Tambah Film
        </a>
        <button type="button" onclick="document.getElementById('tmdb-modal').classList.remove('hidden')"
                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
            Import dari TMDB
        </button>
    </div>
</div>

<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="flex flex-wrap items-center gap-4" id="filter-form">
        <div class="flex-1 min-w-[200px]">
            <input type="text" name="search" id="live-search"
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#e50914]"
                   placeholder="Cari film...">
        </div>
        <select name="status" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Status</option>
            <option value="now_playing">Sedang Tayang</option>
            <option value="coming_soon">Segera Tayang</option>
            <option value="ended">Selesai</option>
        </select>
        <select name="genre" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Genre</option>
            <option value="Action">Action</option>
            <option value="Drama">Drama</option>
            <option value="Comedy">Comedy</option>
            <option value="Horror">Horror</option>
            <option value="Sci-Fi">Sci-Fi</option>
        </select>
    </form>
</div>

<!-- Table -->
<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                    <th class="px-6 py-4 font-medium">Film</th>
                    <th class="px-6 py-4 font-medium">Genre</th>
                    <th class="px-6 py-4 font-medium">Durasi</th>
                    <th class="px-6 py-4 font-medium">Rating</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <!-- Film 1 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://image.tmdb.org/t/p/w92/or06FN3Dka5tuj1yVnS3m7PBNKy.jpg" alt="" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">Avengers: Endgame</p>
                                <p class="text-sm text-gray-500">26 Apr 2019</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-300">Action, Adventure</td>
                    <td class="px-6 py-4 text-gray-300">181 min</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-white">8.4</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Tayang</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/movies/1/edit" class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Film 2 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://image.tmdb.org/t/p/w92/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg" alt="" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">Spider-Man: No Way Home</p>
                                <p class="text-sm text-gray-500">17 Dec 2021</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-300">Action, Adventure</td>
                    <td class="px-6 py-4 text-gray-300">148 min</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-white">8.2</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Tayang</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/movies/2/edit" class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Film 3 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://image.tmdb.org/t/p/w92/8UlWHLMpgZm9bx6QYh0NFoq67TZ.jpg" alt="" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">Dune: Part Two</p>
                                <p class="text-sm text-gray-500">01 Mar 2024</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-300">Sci-Fi, Adventure</td>
                    <td class="px-6 py-4 text-gray-300">166 min</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-white">8.5</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-yellow-500/20 text-yellow-400 text-xs rounded-full">Segera</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/movies/3/edit" class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Film 4 -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://image.tmdb.org/t/p/w92/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg" alt="" class="w-10 h-14 object-cover rounded">
                            <div>
                                <p class="text-white font-medium">Oppenheimer</p>
                                <p class="text-sm text-gray-500">21 Jul 2023</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-300">Drama, History</td>
                    <td class="px-6 py-4 text-gray-300">180 min</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-white">8.6</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 bg-gray-500/20 text-gray-400 text-xs rounded-full">Selesai</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <a href="/admin/movies/4/edit" class="p-2 text-gray-400 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button type="button" class="p-2 text-gray-400 hover:text-red-400 transition-colors">
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
            <p class="text-sm text-gray-400">Menampilkan 1 - 4 dari 12 film</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">Previous</button>
                <button class="px-3 py-1 bg-[#e50914] rounded text-white">1</button>
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">2</button>
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">3</button>
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- TMDB Import Modal -->
<div id="tmdb-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-[#16162a] rounded-xl w-full max-w-2xl mx-4 border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white">Import Film dari TMDB</h3>
            <button type="button" onclick="document.getElementById('tmdb-modal').classList.add('hidden')" class="text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <input type="text" id="tmdb-search" 
                       class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white placeholder-gray-500"
                       placeholder="Cari film di TMDB...">
            </div>
            <div id="tmdb-results" class="max-h-96 overflow-y-auto space-y-2">
                <p class="text-gray-500 text-center py-8">Ketik untuk mencari film</p>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>