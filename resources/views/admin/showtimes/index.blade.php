<x-layouts.admin title="Kelola Jadwal Tayang">
<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.showtimes.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
        + Tambah Jadwal
    </a>
</div>

<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        <select name="movie_id" onchange="this.form.submit()" class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
            <option value="">Semua Film</option>
            @foreach($movies as $movie)
                <option value="{{ $movie->id }}" {{ request('movie_id') == $movie->id ? 'selected' : '' }}>{{ Str::limit($movie->title, 25) }}</option>
            @endforeach
        </select>
        <select name="cinema_id" onchange="this.form.submit()" class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
            <option value="">Semua Bioskop</option>
            @foreach($cinemas as $cinema)
                <option value="{{ $cinema->id }}" {{ request('cinema_id') == $cinema->id ? 'selected' : '' }}>{{ $cinema->name }}</option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}" onchange="this.form.submit()"
               class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
    </form>
</div>

<!-- Desktop Table -->
<div class="desktop-table">
    <div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="px-6 py-4 font-medium">Film</th>
                        <th class="px-6 py-4 font-medium">Bioskop</th>
                        <th class="px-6 py-4 font-medium">Studio</th>
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                        <th class="px-6 py-4 font-medium">Jam</th>
                        <th class="px-6 py-4 font-medium">Harga</th>
                        <th class="px-6 py-4 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($showtimes as $showtime)
                        <tr class="hover:bg-white/5">
                            <td class="px-6 py-4 text-white">{{ Str::limit($showtime->movie->title, 25) }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $showtime->studio->cinema->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $showtime->studio->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $showtime->show_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-white font-medium">{{ $showtime->formatted_time }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $showtime->formatted_price }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.showtimes.edit', $showtime) }}" class="p-2 text-gray-400 hover:text-white">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form id="delete-showtime-{{ $showtime->id }}" action="{{ route('admin.showtimes.destroy', $showtime) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" @click="confirmModal('delete-showtime-{{ $showtime->id }}')" class="p-2 text-gray-400 hover:text-red-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">Belum ada jadwal tayang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($showtimes->hasPages())
            <div class="px-6 py-4 border-t border-white/10">
                {{ $showtimes->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Mobile Cards -->
<div class="mobile-cards">
    <div class="space-y-3 p-1">
        @forelse($showtimes as $showtime)
            <div class="mobile-card">
                <div class="mb-3">
                    <h3 class="text-white font-semibold">{{ $showtime->movie->title }}</h3>
                    <p class="text-gray-400 text-sm">{{ $showtime->studio->cinema->name }} - {{ $showtime->studio->name }}</p>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Tanggal</span>
                    <span class="mobile-card-value">{{ $showtime->show_date->format('d M Y') }}</span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Jam</span>
                    <span class="mobile-card-value font-semibold text-white">{{ $showtime->formatted_time }}</span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Harga</span>
                    <span class="mobile-card-value text-green-400">{{ $showtime->formatted_price }}</span>
                </div>
                <div class="flex items-center gap-2 mt-3 pt-3 border-t border-white/10">
                    <a href="{{ route('admin.showtimes.edit', $showtime) }}" class="flex-1 px-3 py-2 bg-white/10 text-white text-center text-sm rounded-lg hover:bg-white/20">
                        Edit
                    </a>
                    <form id="delete-showtime-mobile-{{ $showtime->id }}" action="{{ route('admin.showtimes.destroy', $showtime) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="button" @click="confirmModal('delete-showtime-mobile-{{ $showtime->id }}')" class="w-full px-3 py-2 bg-red-500/20 text-red-400 text-sm rounded-lg hover:bg-red-500/30">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-12 text-gray-500">Belum ada jadwal tayang</div>
        @endforelse
    </div>
    @if($showtimes->hasPages())
        <div class="mt-4">
            {{ $showtimes->withQueryString()->links() }}
        </div>
    @endif
</div>
</x-layouts.admin>