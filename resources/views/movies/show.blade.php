<x-layouts.app :title="$movie->title">
<!-- Hero Section with Backdrop -->
<section class="relative min-h-[60vh] flex items-end">
    <!-- Background -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $movie->backdrop_url }}" alt="" class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f1a] via-[#0f0f1a]/80 to-[#0f0f1a]/40"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 w-full pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Poster -->
                <div class="flex-shrink-0">
                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" 
                         class="w-48 md:w-64 rounded-xl shadow-2xl mx-auto md:mx-0">
                </div>

                <!-- Info -->
                <div class="flex-1 text-center md:text-left">
                    <!-- Status Badge -->
                    <div class="mb-4">
                        @if($movie->status === 'now_playing')
                            <span class="px-3 py-1 bg-green-500 text-white text-sm font-bold rounded-full">
                                SEDANG TAYANG
                            </span>
                        @elseif($movie->status === 'coming_soon')
                            <span class="px-3 py-1 bg-[#f5c518] text-black text-sm font-bold rounded-full">
                                SEGERA TAYANG
                            </span>
                        @endif
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">{{ $movie->title }}</h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 text-gray-300 mb-6">
                        @if($movie->rating > 0)
                            <div class="flex items-center gap-1">
                                <svg class="w-5 h-5 text-[#f5c518]" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="font-semibold">{{ number_format($movie->rating, 1) }}/10</span>
                            </div>
                        @endif
                        <span>•</span>
                        <span>{{ $movie->duration }} menit</span>
                        @if($movie->release_date)
                            <span>•</span>
                            <span>{{ $movie->release_date->format('d M Y') }}</span>
                        @endif
                    </div>

                    <!-- Genres -->
                    @if($movie->genre)
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-6">
                            @foreach(explode(', ', $movie->genre) as $genre)
                                <span class="px-3 py-1 bg-white/10 backdrop-blur-sm text-white text-sm rounded-full">
                                    {{ $genre }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <!-- Synopsis -->
                    @if($movie->synopsis)
                        <p class="text-gray-300 max-w-2xl leading-relaxed">
                            {{ $movie->synopsis }}
                        </p>
                    @endif
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
            <div x-data="{ activeDate: '{{ $dates->first() }}' }" class="space-y-6">
            <!-- Date Selector -->
                <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-hide">
                    @foreach($dates as $date)
                        <button @click="activeDate = '{{ $date }}'"
                                :class="activeDate === '{{ $date }}' ? 'bg-[#e50914] text-white' : 'bg-[#16162a] text-gray-400 hover:text-white'"
                                class="flex-shrink-0 px-4 py-3 rounded-xl font-medium transition-colors border border-white/10">
                            <div class="text-xs uppercase">{{ \Carbon\Carbon::parse($date)->format('D') }}</div>
                            <div class="text-lg font-bold">{{ \Carbon\Carbon::parse($date)->format('d') }}</div>
                            <div class="text-xs">{{ \Carbon\Carbon::parse($date)->format('M') }}</div>
                        </button>
                    @endforeach
                </div>

                <!-- Showtimes by Cinema -->
                @foreach($dates as $date)
                    <div x-show="activeDate === '{{ $date }}'" x-transition class="space-y-4">
                        @if(isset($showtimes[$date]) && $showtimes[$date]->isNotEmpty())
                            @foreach($showtimes[$date] as $cinemaId => $cinemaShowtimes)
                                @php $cinema = $cinemaShowtimes->first()->studio->cinema; @endphp
                                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                                    <!-- Cinema Info -->
                                    <div class="flex items-start gap-4 mb-4">
                                        @if($cinema->image)
                                            <img src="{{ $cinema->image_url }}" alt="{{ $cinema->name }}" class="w-16 h-16 rounded-lg object-cover">
                                        @endif
                                        <div>
                                            <h3 class="text-lg font-semibold text-white">{{ $cinema->name }}</h3>
                                            <p class="text-sm text-gray-400">{{ $cinema->address }}, {{ $cinema->city }}</p>
                                        </div>
                                    </div>

                                    <!-- Grouped by Studio Type -->
                                    @php
                                        $byStudioType = $cinemaShowtimes->groupBy(fn($s) => $s->studio->type);
                                    @endphp
                                    
                                    @foreach($byStudioType as $type => $typeShowtimes)
                                        <div class="mb-4 last:mb-0">
                                            <div class="flex items-center gap-2 mb-3">
                                                <span class="text-sm font-medium text-gray-400">{{ $typeShowtimes->first()->studio->type_label }}</span>
                                                <span class="text-sm text-gray-500">•</span>
                                                <span class="text-sm text-[#e50914] font-medium">{{ $typeShowtimes->first()->formatted_price }}</span>
                                            </div>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($typeShowtimes->sortBy('show_time') as $showtime)
                                                    @php
                                                        $isPast = \Carbon\Carbon::parse($showtime->show_date->format('Y-m-d') . ' ' . $showtime->show_time)->isPast();
                                                    @endphp
                                                    @if($isPast)
                                                        <span class="px-4 py-2 bg-gray-700/50 text-gray-500 rounded-lg text-sm cursor-not-allowed">
                                                            {{ $showtime->formatted_time }}
                                                        </span>
                                                    @else
                                                        <a href="{{ route('booking.seats', $showtime) }}"
                                                           class="px-4 py-2 bg-[#0f0f1a] hover:bg-[#e50914] text-white rounded-lg text-sm font-medium transition-colors border border-white/10 hover:border-[#e50914]">
                                                            {{ $showtime->formatted_time }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            <!-- No showtimes for this date -->
                            <div class="bg-[#16162a] rounded-xl p-8 text-center border border-white/10">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-gray-400">Tidak ada jadwal tayang untuk tanggal ini</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
    </div>
</section>
</x-layouts.app>
