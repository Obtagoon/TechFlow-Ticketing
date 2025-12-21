<x-layouts.app title="Semua Film">
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white">Semua Film</h1>
            <p class="text-gray-400 mt-2">Temukan film favorit Anda dan pesan tiketnya sekarang</p>
        </div>

        <!-- Filters -->
        <div class="bg-[#16162a] rounded-xl p-4 mb-8 border border-white/10">
            <form method="GET" class="flex flex-wrap items-center gap-4">
                <!-- Search -->
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <input type="text" name="search" value=""
                               class="w-full pl-10 pr-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#e50914] focus:border-transparent"
                               placeholder="Cari film...">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <!-- Status Filter -->
                <select name="status"
                        class="px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                    <option value="">Semua Status</option>
                    <option value="now_playing">Sedang Tayang</option>
                    <option value="coming_soon">Segera Tayang</option>
                </select>

                <!-- Genre Filter -->
                <select name="genre"
                        class="px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                    <option value="">Semua Genre</option>
                    <option value="Action">Action</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Horror">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Romance">Romance</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Animation">Animation</option>
                </select>

                <!-- Search Button -->
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
                    Cari
                </button>

                <a href="#" class="px-4 py-2.5 text-gray-400 hover:text-white transition-colors">
                    Reset
                </a>
            </form>
        </div>

        <!-- Movie Card -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            
            <!-- Movie -->
            <a href="#" class="group">
                <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-3">
                    <img src="https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg" alt="Avengers: Endgame" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    
                    <!-- Status Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="px-2 py-1 bg-green-500 text-white text-xs font-bold rounded-full">
                            TAYANG
                        </span>
                    </div>

                    <!-- Rating -->
                    <div class="absolute top-3 right-3 flex items-center gap-1 px-2 py-1 bg-black/60 backdrop-blur-sm rounded-lg">
                        <svg class="w-4 h-4 text-[#f5c518]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-white text-sm font-medium">8.5</span>
                    </div>

                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="absolute bottom-4 left-4 right-4">
                            <span class="inline-flex items-center gap-1 px-3 py-1.5 bg-[#e50914] text-white text-xs font-semibold rounded-full">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                                Lihat Detail
                            </span>
                        </div>
                    </div>
                </div>
                <h3 class="font-semibold text-white group-hover:text-[#e50914] transition-colors line-clamp-1">Avengers: Endgame</h3>
                <div class="flex items-center gap-2 text-sm text-gray-400 mt-1">
                    <span>181 menit</span>
                    <span>•</span>
                    <span class="line-clamp-1">Action</span>
                </div>
            </a>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center gap-1">
                <span class="px-3 py-2 text-gray-500 cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </span>
                <a href="#" class="px-4 py-2 bg-[#e50914] text-white rounded-lg font-medium">1</a>
                <a href="#" class="px-4 py-2 text-gray-400 hover:bg-white/10 rounded-lg transition-colors">2</a>
                <a href="#" class="px-4 py-2 text-gray-400 hover:bg-white/10 rounded-lg transition-colors">3</a>
                <span class="px-3 py-2 text-gray-400">...</span>
                <a href="#" class="px-4 py-2 text-gray-400 hover:bg-white/10 rounded-lg transition-colors">10</a>
                <a href="#" class="px-3 py-2 text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
</x-layouts.app>
