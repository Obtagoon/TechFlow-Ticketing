<x-layouts.admin title="Dashboard">
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Film</p>
                <p class="text-3xl font-bold text-white mt-1">{{ $stats['total_movies'] }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $stats['now_playing'] }} sedang tayang</p>
            </div>
            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Pemesanan</p>
                <p class="text-3xl font-bold text-white mt-1">{{ $stats['total_bookings'] }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $stats['today_bookings'] }} hari ini</p>
            </div>
            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Pendapatan</p>
                <p class="text-2xl font-bold text-white mt-1">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
                <p class="text-sm text-green-400 mt-1">+Rp {{ number_format($stats['today_revenue'], 0, ',', '.') }} hari ini</p>
            </div>
            <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total User</p>
                <p class="text-3xl font-bold text-white mt-1">{{ $stats['total_users'] }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $stats['new_users_today'] }} user baru hari ini</p>
            </div>
            <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-8">
    <!-- Recent Bookings -->
    <div class="lg:col-span-2 bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white">Pemesanan Terbaru</h2>
                <a href="{{ route('admin.bookings.index') }}" class="text-sm text-[#e50914] hover:underline">Lihat Semua</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="px-6 py-3 font-medium">Kode</th>
                        <th class="px-6 py-3 font-medium">User</th>
                        <th class="px-6 py-3 font-medium">Film</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($recentBookings as $booking)
                        <tr class="hover:bg-white/5">
                            <td class="px-6 py-4 font-mono text-sm text-white">{{ $booking->booking_code }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $booking->user->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ Str::limit($booking->showtime->movie->title, 20) }}</td>
                            <td class="px-6 py-4 text-white">{{ $booking->formatted_price }}</td>
                            <td class="px-6 py-4">
                                @php $status = $booking->status_label; @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-medium
                                    @if($status['color'] === 'green') bg-green-500/20 text-green-400
                                    @elseif($status['color'] === 'yellow') bg-yellow-500/20 text-yellow-400
                                    @elseif($status['color'] === 'red') bg-red-500/20 text-red-400
                                    @else bg-gray-500/20 text-gray-400
                                    @endif">
                                    {{ $status['label'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada pemesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Popular Movies -->
    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Film Populer Minggu Ini</h2>
        </div>
        <div class="p-6 space-y-4">
            @forelse($popularMovies as $index => $movie)
                <div class="flex items-center gap-4">
                    <span class="w-6 h-6 flex items-center justify-center rounded-full 
                        {{ $index < 3 ? 'bg-[#e50914] text-white' : 'bg-white/10 text-gray-400' }} 
                        text-sm font-bold">
                        {{ $index + 1 }}
                    </span>
                    <img src="{{ $movie->poster_url }}" alt="" class="w-12 h-16 object-cover rounded">
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-medium truncate">{{ $movie->title }}</p>
                        <p class="text-sm text-gray-400">{{ $movie->showtimes_count ?? 0 }} pemesanan</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center py-4">Belum ada data</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Revenue Chart Placeholder -->
<div class="mt-8 bg-[#16162a] rounded-xl border border-white/10 p-6">
    <h2 class="text-lg font-semibold text-white mb-6">Pendapatan 7 Hari Terakhir</h2>
    @php
        $maxRevenue = collect($revenueData)->max('revenue') ?: 1;
    @endphp
    <div class="h-64 flex items-end justify-between gap-4 pb-8">
        @foreach($revenueData as $data)
            @php
                $height = $maxRevenue > 0 ? ($data['revenue'] / $maxRevenue) * 100 : 0;
                $hasRevenue = $data['revenue'] > 0;
            @endphp
            <div class="flex-1 flex flex-col items-center gap-2">
                @if($hasRevenue)
                    <span class="text-xs text-green-400 font-medium">
                        Rp {{ number_format($data['revenue'] / 1000, 0, ',', '.') }}K
                    </span>
                @endif
                <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80 {{ $hasRevenue ? 'min-h-[20px]' : 'min-h-[4px] opacity-30' }}"
                     style="height: {{ $hasRevenue ? max($height, 10) : 2 }}%"
                     title="Rp {{ number_format($data['revenue'], 0, ',', '.') }}">
                </div>
                <span class="text-xs text-gray-400">{{ $data['date'] }}</span>
            </div>
        @endforeach
    </div>
</div>
</x-layouts.admin>