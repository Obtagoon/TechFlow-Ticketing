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
