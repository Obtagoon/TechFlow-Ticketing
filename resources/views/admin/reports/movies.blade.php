<x-layouts.admin title="Laporan Performa Film">
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-semibold text-white">Laporan Performa Film</h2>
            <p class="text-gray-400 text-sm">Periode: {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}</p>
        </div>
        <div class="flex gap-2 w-full sm:w-auto">
            <a href="{{ route('admin.reports.index') }}" class="flex-1 sm:flex-none px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:opacity-90 text-center">
                Kembali
            </a>
            <a href="{{ route('admin.reports.movies', ['start_date' => $startDate->format('Y-m-d'), 'end_date' => $endDate->format('Y-m-d'), 'download' => 1]) }}" 
               class="flex-1 sm:flex-none px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:opacity-90 text-center">
                Download PDF
            </a>
        </div>
    </div>

    <!-- Movies Table -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-4 sm:p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Performa Film</h3>
        
        <!-- Desktop Table -->
        <div class="desktop-table">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                            <th class="pb-3">No</th>
                            <th class="pb-3">Film</th>
                            <th class="pb-3">Genre</th>
                            <th class="pb-3 text-center">Total Jadwal</th>
                            <th class="pb-3 text-right">Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($movies as $index => $movie)
                        <tr class="border-b border-white/5">
                            <td class="py-3 text-gray-400">{{ $index + 1 }}</td>
                            <td class="py-3">
                                <div class="flex items-center gap-3">
                                    @if($movie->poster)
                                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="w-10 h-14 object-cover rounded">
                                    @endif
                                    <span class="text-white font-medium">{{ $movie->title }}</span>
                                </div>
                            </td>
                            <td class="py-3 text-gray-400">{{ $movie->genre ?? '-' }}</td>
                            <td class="py-3 text-gray-400 text-center">{{ $movie->total_showtimes }}</td>
                            <td class="py-3 text-green-500 text-right font-medium">
                                Rp {{ number_format($movie->total_revenue ?? 0, 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-400">Tidak ada data film</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Mobile Cards -->
        <div class="mobile-cards space-y-3">
            @forelse ($movies as $index => $movie)
            <div class="mobile-card">
                <div class="flex items-start gap-3 mb-3">
                    @if($movie->poster)
                    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}" class="w-14 h-20 object-cover rounded-lg">
                    @else
                    <div class="w-14 h-20 bg-white/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    @endif
                    <div class="flex-1">
                        <span class="text-gray-500 text-xs">#{{ $index + 1 }}</span>
                        <h4 class="text-white font-medium">{{ $movie->title }}</h4>
                        <p class="text-gray-400 text-sm">{{ $movie->genre ?? '-' }}</p>
                    </div>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Total Jadwal</span>
                    <span class="mobile-card-value">{{ $movie->total_showtimes }}</span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Pendapatan</span>
                    <span class="mobile-card-value text-green-500 font-medium">Rp {{ number_format($movie->total_revenue ?? 0, 0, ',', '.') }}</span>
                </div>
            </div>
            @empty
            <div class="text-center py-4 text-gray-400">Tidak ada data film</div>
            @endforelse
        </div>
    </div>
</div>
</x-layouts.admin>