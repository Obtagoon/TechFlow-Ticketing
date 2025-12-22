<x-layouts.app title="Avengers: Endgame">
<!-- Hero Section with Backdrop -->
<section class="relative min-h-[60vh] flex items-end">
    <!-- Background -->
    <div class="absolute inset-0 z-0">
        <img src="https://via.placeholder.com/1920x1080/1a1a2e/333333?text=Backdrop" alt="" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1a] via-[#0f0f1a]/80 to-[#0f0f1a]/40"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 w-full pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Poster -->
                <div class="flex-shrink-0">
                    <img src="https://via.placeholder.com/300x450/1a1a2e/ffffff?text=Poster" alt="Avengers: Endgame" 
                         class="w-48 md:w-64 rounded-xl shadow-2xl mx-auto md:mx-0">
                </div>

                <!-- Info -->
                <div class="flex-1 text-center md:text-left">
                    <!-- Status Badge -->
                    <div class="mb-4">
                        <span class="px-3 py-1 bg-green-500 text-white text-sm font-bold rounded-full">
                            SEDANG TAYANG
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">Avengers: Endgame</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        <div class="flex items-center gap-1">
                            <svg class="w-5 h-5 text-[#f5c518]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="font-semibold">8.4/10</span>
                        </div>
                        <span>•</span>
                        <span>181 menit</span>
                        <span>•</span>
                        <span>26 Apr 2019</span>
                    </div>

                    <!-- Genres -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-6">
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-sm text-white text-sm rounded-full">Action</span>
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-sm text-white text-sm rounded-full">Adventure</span>
                        <span class="px-3 py-1 bg-white/10 backdrop-blur-sm text-white text-sm rounded-full">Sci-Fi</span>
                    </div>

                    <!-- Synopsis -->
                    <p class="text-gray-300 max-w-2xl leading-relaxed">
                        Setelah peristiwa dahsyat Avengers: Infinity War, alam semesta menjadi reruntuhan. Dengan bantuan sekutu yang tersisa, 
                        Avengers berkumpul sekali lagi untuk membalikkan tindakan Thanos dan memulihkan keseimbangan alam semesta.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Showtimes Section -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white mb-6">Jadwal Tayang</h2>

        <!-- Date Tabs -->
        <div x-data="{ activeDate: '2024-12-21' }" class="space-y-6">
            <!-- Date Selector -->
            <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-hide">
                <button @click="activeDate = '2024-12-21'"
                        :class="activeDate === '2024-12-21' ? 'bg-[#e50914] text-white' : 'bg-[#16162a] text-gray-400 hover:text-white'"
                        class="flex-shrink-0 px-4 py-3 rounded-xl font-medium transition-colors border border-white/10">
                    <div class="text-xs uppercase">SAT</div>
                    <div class="text-lg font-bold">21</div>
                    <div class="text-xs">Dec</div>
                </button>
                <button @click="activeDate = '2024-12-22'"
                        :class="activeDate === '2024-12-22' ? 'bg-[#e50914] text-white' : 'bg-[#16162a] text-gray-400 hover:text-white'"
                        class="flex-shrink-0 px-4 py-3 rounded-xl font-medium transition-colors border border-white/10">
                    <div class="text-xs uppercase">SUN</div>
                    <div class="text-lg font-bold">22</div>
                    <div class="text-xs">Dec</div>
                </button>
                <button @click="activeDate = '2024-12-23'"
                        :class="activeDate === '2024-12-23' ? 'bg-[#e50914] text-white' : 'bg-[#16162a] text-gray-400 hover:text-white'"
                        class="flex-shrink-0 px-4 py-3 rounded-xl font-medium transition-colors border border-white/10">
                    <div class="text-xs uppercase">MON</div>
                    <div class="text-lg font-bold">23</div>
                    <div class="text-xs">Dec</div>
                </button>
            </div>

            <!-- Showtimes by Cinema -->
            <div x-show="activeDate === '2024-12-21'" x-transition class="space-y-4">
                <!-- Cinema 1 -->
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <!-- Cinema Info -->
                    <div class="flex items-start gap-4 mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-white">CGV Grand Indonesia</h3>
                            <p class="text-sm text-gray-400">Jl. MH Thamrin No.1, Jakarta Pusat</p>
                        </div>
                    </div>

                    <!-- Grouped by Studio Type -->
                    <div class="mb-4 last:mb-0">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm font-medium text-gray-400">Regular 2D</span>
                            <span class="text-sm text-gray-500">•</span>
                            <span class="text-sm text-[#e50914] font-medium">Rp 50.000</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">10:30</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">13:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">15:30</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">18:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">20:30</a>
                        </div>
                    </div>
                </div>

                <!-- Cinema 2 -->
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <div class="flex items-start gap-4 mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-white">XXI Pondok Indah</h3>
                            <p class="text-sm text-gray-400">Mall Pondok Indah, Jakarta Selatan</p>
                        </div>
                    </div>

                    <div class="mb-4 last:mb-0">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm font-medium text-gray-400">Regular 2D</span>
                            <span class="text-sm text-gray-500">•</span>
                            <span class="text-sm text-[#e50914] font-medium">Rp 45.000</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">11:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">14:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">17:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">20:00</a>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeDate === '2024-12-22'" x-transition class="space-y-4">
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <div class="flex items-start gap-4 mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-white">CGV Grand Indonesia</h3>
                            <p class="text-sm text-gray-400">Jl. MH Thamrin No.1, Jakarta Pusat</p>
                        </div>
                    </div>
                    <div class="mb-4 last:mb-0">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-sm font-medium text-gray-400">Regular 2D</span>
                            <span class="text-sm text-gray-500">•</span>
                            <span class="text-sm text-[#e50914] font-medium">Rp 55.000</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">12:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">15:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">18:00</a>
                            <a href="#" class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">21:00</a>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="activeDate === '2024-12-23'" x-transition class="space-y-4">
                <div class="bg-[#16162a] rounded-xl p-8 text-center border border-white/10">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-white mb-2">Belum ada jadwal tayang</h3>
                    <p class="text-gray-400">Jadwal tayang untuk tanggal ini belum tersedia.</p>
                </div>
            </div>
        </div>
    </div>
</section>
</x-layouts.app>