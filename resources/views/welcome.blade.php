<x-layouts.app title="Beranda">
<!-- Hero Section -->
<section class="relative min-h-[100vh] flex items-center justify-center overflow-hidden">
    <!-- Latar Belakang -->
    <div class="absolute inset-0 z-0">
        @if($nowPlaying->first())
            <img src="{{ $nowPlaying->first()->backdrop_url }}" alt="" class="w-full h-full object-cover opacity-40">
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1a] via-[#0f0f1a]/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0f0f1a] via-transparent to-[#0f0f1a]"></div>
    </div>

    <!-- Konten Hero -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6">
            <span class="bg-gradient-to-r from-white via-gray-200 to-gray-400 bg-clip-text text-transparent">
                Pengalaman Menonton
            </span>
            <br>
            <span class="bg-gradient-to-r from-[#e50914] to-[#f5c518] bg-clip-text text-transparent">
                Terbaik di Kota Anda
            </span>
        </h1>
        <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto mb-8">
            Pesan tiket bioskop online dengan mudah dan cepat. Pilih film favorit, pilih kursi, dan nikmati filmnya!
        </p>
        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('movies.index') }}" class="px-8 py-4 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-full hover:opacity-90 transition-all transform hover:scale-105 shadow-lg shadow-red-500/25">
                Lihat Semua Film
            </a>
            <a href="#now-playing" class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full hover:bg-white/20 transition-all border border-white/20">
                Sedang Tayang
            </a>
        </div>
    </div>

    <!-- Indikator Scroll -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

<!-- Bagian Sedang Tayang -->
<section id="now-playing" class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold">Sedang Tayang</h2>
                <p class="text-gray-400 mt-1">Film-film terbaik yang sedang tayang di bioskop</p>
            </div>
            <a href="{{ route('movies.index') }}?status=now_playing" class="text-[#e50914] hover:text-[#f5c518] font-medium transition-colors flex items-center gap-2">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        @if($nowPlaying->isEmpty())
            <div class="text-center py-12 text-gray-400">
                <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                </svg>
                <p>Belum ada film yang sedang tayang</p>
            </div>
        @else
            <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-[#e50914] scrollbar-track-[#16162a] scroll-smooth snap-x snap-mandatory">
                @foreach($nowPlaying as $movie)
                    <a href="{{ route('movies.show', $movie) }}" class="group flex-shrink-0 w-[280px] md:w-[300px] lg:w-[320px] snap-start">
                        <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-3">
                            <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="absolute bottom-4 left-4 right-4">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-[#e50914] text-white text-xs font-semibold rounded-full">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                        </svg>
                                        Beli Tiket
                                    </span>
                                </div>
                            </div>
                            @if($movie->rating > 0)
                                <div class="absolute top-3 right-3 flex items-center gap-1 px-2 py-1 bg-black/60 backdrop-blur-sm rounded-lg">
                                    <svg class="w-4 h-4 text-[#f5c518]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-white text-sm font-medium">{{ number_format($movie->rating, 1) }}</span>
                                </div>
                            @endif
                        </div>
                        <h3 class="font-semibold text-white group-hover:text-[#e50914] transition-colors line-clamp-1">{{ $movie->title }}</h3>
                        <p class="text-sm text-gray-400 line-clamp-1">{{ $movie->genre }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Bagian Segera Tayang -->
<section class="py-16 bg-[#0a0a12]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold">Segera Tayang</h2>
                <p class="text-gray-400 mt-1">Film-film yang akan segera hadir di bioskop</p>
            </div>
            <a href="{{ route('movies.index') }}?status=coming_soon" class="text-[#e50914] hover:text-[#f5c518] font-medium transition-colors flex items-center gap-2">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        @if($comingSoon->isEmpty())
            <div class="text-center py-12 text-gray-400">
                <p>Belum ada film yang akan datang</p>
            </div>
        @else
            <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-[#e50914] scrollbar-track-[#16162a] scroll-smooth snap-x snap-mandatory">
                @foreach($comingSoon as $movie)
                    <a href="{{ route('movies.show', $movie) }}" class="group flex-shrink-0 w-[280px] md:w-[300px] lg:w-[320px] snap-start">
                        <div class="relative aspect-[2/3] rounded-xl overflow-hidden mb-3">
                            <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 bg-[#f5c518] text-black text-xs font-bold rounded-full">
                                    COMING SOON
                                </span>
                            </div>
                            @if($movie->release_date)
                                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                                    <p class="text-sm text-gray-300">
                                        {{ $movie->release_date->format('d M Y') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                        <h3 class="font-semibold text-white group-hover:text-[#e50914] transition-colors line-clamp-1">{{ $movie->title }}</h3>
                        <p class="text-sm text-gray-400 line-clamp-1">{{ $movie->genre }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Bagian Fitur -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Kenapa Memilih TechFlow Ticketing?</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Nikmati kemudahan dan kenyamanan dalam memesan tiket bioskop</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Fitur 1 -->
            <div class="text-center p-8 rounded-2xl bg-gradient-to-b from-[#16162a] to-transparent border border-white/5 hover:border-[#e50914]/30 transition-colors">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#e50914] to-[#b20710] flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Booking Cepat</h3>
                <p class="text-gray-400">Pesan tiket dalam hitungan detik. Tanpa antri, tanpa ribet.</p>
            </div>

            <!-- Fitur 2 -->
            <div class="text-center p-8 rounded-2xl bg-gradient-to-b from-[#16162a] to-transparent border border-white/5 hover:border-[#e50914]/30 transition-colors">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-[#f5c518] to-[#d4a816] flex items-center justify-center">
                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">E-Ticket Instan</h3>
                <p class="text-gray-400">Tiket langsung tersedia di HP Anda. Tinggal scan dan masuk.</p>
            </div>

            <!-- Fitur 3 -->
            <div class="text-center p-8 rounded-2xl bg-gradient-to-b from-[#16162a] to-transparent border border-white/5 hover:border-[#e50914]/30 transition-colors">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Pembayaran Aman</h3>
                <p class="text-gray-400">Berbagai metode pembayaran yang aman dan terpercaya.</p>
            </div>
        </div>
    </div>
</section>
</x-layouts.app>