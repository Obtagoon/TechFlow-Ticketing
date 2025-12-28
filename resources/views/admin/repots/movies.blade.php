<x-layouts.admin title="Laporan Performa Film">
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-white">Laporan Performa Film</h2>
            <p class="text-gray-400 text-sm">Periode: {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.reports.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:opacity-90">
                Kembali
            </a>
            <a href="{{ route('admin.reports.movies', ['start_date' => $startDate->format('Y-m-d'), 'end_date' => $endDate->format('Y-m-d'), 'download' => 1]) }}" 
               class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:opacity-90">
                Download PDF
            </a>
        </div>
    </div>

    <!-- Movies Table -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Performa Film</h3>
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
</div>
</x-layouts.admin>
