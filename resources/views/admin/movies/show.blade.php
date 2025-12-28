<x-layouts.admin title="Detail Film">
<div class="max-w-4xl">
    <a href="{{ route('admin.movies.index') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <!-- Backdrop -->
    @if($movie->backdrop_url)
        <div class="relative h-48 rounded-xl overflow-hidden mb-6">
            <img src="{{ $movie->backdrop_url }}" alt="" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1a] to-transparent"></div>
        </div>
    @endif

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Detail Film</h2>
            @php
                $statusColors = [
                    'now_playing' => 'bg-green-500/20 text-green-400',
                    'coming_soon' => 'bg-yellow-500/20 text-yellow-400',
                    'ended' => 'bg-gray-500/20 text-gray-400',
                ];
                $statusLabels = [
                    'now_playing' => 'Sedang Tayang',
                    'coming_soon' => 'Segera Tayang',
                    'ended' => 'Selesai',
                ];
            @endphp
            <span class="px-3 py-1 text-sm rounded-full {{ $statusColors[$movie->status] ?? 'bg-gray-500/20 text-gray-400' }}">
                {{ $statusLabels[$movie->status] ?? $movie->status }}
            </span>
        </div>

        <div class="p-6 space-y-6">
            <!-- Movie Info -->
            <div class="flex gap-6">
                <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="w-40 h-56 object-cover rounded-xl shadow-lg">
                <div class="flex-1 space-y-4">
                    <div>
                        <h3 class="text-2xl font-bold text-white">{{ $movie->title }}</h3>
                        @if($movie->genre)
                            <p class="text-gray-400 mt-1">{{ $movie->genre }}</p>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-500 text-sm">Durasi</p>
                            <p class="text-white">{{ $movie->duration }} menit</p>
                        </div>
                        @if($movie->rating)
                            <div>
                                <p class="text-gray-500 text-sm">Rating</p>
                                <p class="text-white flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    {{ number_format($movie->rating, 1) }}
                                </p>
                            </div>
                        @endif
                        @if($movie->release_date)
                            <div>
                                <p class="text-gray-500 text-sm">Tanggal Rilis</p>
                                <p class="text-white">{{ $movie->release_date->format('d M Y') }}</p>
                            </div>
                        @endif
                        @if($movie->tmdb_id)
                            <div>
                                <p class="text-gray-500 text-sm">TMDB ID</p>
                                <p class="text-white">{{ $movie->tmdb_id }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($movie->synopsis)
                <hr class="border-white/10">
                <div>
                    <h3 class="font-medium text-white mb-2">Sinopsis</h3>
                    <p class="text-gray-400 leading-relaxed">{{ $movie->synopsis }}</p>
                </div>
            @endif

            <hr class="border-white/10">

            <!-- Upcoming Showtimes -->
            <div>
                <h3 class="font-medium text-white mb-4">Jadwal Tayang Mendatang ({{ $movie->showtimes->count() }})</h3>
                @if($movie->showtimes->count() > 0)
                    <div class="grid gap-3">
                        @foreach($movie->showtimes as $showtime)
                            <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5 flex items-center justify-between">
                                <div>
                                    <p class="text-white font-medium">{{ $showtime->studio->cinema->name }} - {{ $showtime->studio->name }}</p>
                                    <p class="text-gray-500 text-sm">{{ $showtime->show_date->format('l, d M Y') }} • {{ $showtime->formatted_time }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[#e50914] font-bold">Rp {{ number_format($showtime->price, 0, ',', '.') }}</p>
                                    <p class="text-gray-500 text-xs">{{ $showtime->studio->type_label }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-sm">Tidak ada jadwal tayang mendatang</p>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-4 border-t border-white/10">
                <a href="{{ route('admin.movies.edit', $movie) }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white rounded-lg hover:opacity-90">
                    Edit Film
                </a>
                <form id="delete-movie-{{ $movie->id }}" action="{{ route('admin.movies.destroy', $movie) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" @click="confirmModal('delete-movie-{{ $movie->id }}')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-90">
                    Hapus Film
                </button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>
