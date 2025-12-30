<x-layouts.admin title="Kelola Pemesanan">
<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
        <div class="sm:col-span-2 lg:col-span-1">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode booking..."
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
        </div>
        <select name="status" onchange="this.form.submit()" class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Bayar</option>
            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Dibayar</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Kadaluarsa</option>
        </select>
        <button type="submit" class="w-full px-4 py-2 bg-[#e50914] text-white text-sm rounded-lg hover:opacity-90">Cari</button>
    </form>
</div>

<!-- Desktop Table -->
<div class="desktop-table">
    <div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="px-6 py-4 font-medium">Kode</th>
                        <th class="px-6 py-4 font-medium">User</th>
                        <th class="px-6 py-4 font-medium">Film</th>
                        <th class="px-6 py-4 font-medium">Jadwal</th>
                        <th class="px-6 py-4 font-medium">Kursi</th>
                        <th class="px-6 py-4 font-medium">Total</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-white/5">
                            <td class="px-6 py-4 font-mono text-sm text-white">{{ $booking->booking_code }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ $booking->user->name }}</td>
                            <td class="px-6 py-4 text-gray-300">{{ Str::limit($booking->showtime->movie->title, 20) }}</td>
                            <td class="px-6 py-4 text-gray-300">
                                {{ $booking->showtime->show_date->format('d/m/Y') }} {{ $booking->showtime->formatted_time }}
                            </td>
                            <td class="px-6 py-4 text-white">{{ $booking->seat_codes }}</td>
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
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.bookings.show', $booking) }}" class="text-[#e50914] hover:underline text-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-gray-500">Belum ada pemesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($bookings->hasPages())
            <div class="px-6 py-4 border-t border-white/10">
                {{ $bookings->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Mobile Cards -->
<div class="mobile-cards">
    <div class="space-y-3 p-1">
        @forelse($bookings as $booking)
            <div class="mobile-card">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-mono text-sm text-white bg-white/10 px-2 py-1 rounded">{{ $booking->booking_code }}</span>
                    @php $status = $booking->status_label; @endphp
                    <span class="px-2 py-1 rounded-full text-xs font-medium
                        @if($status['color'] === 'green') bg-green-500/20 text-green-400
                        @elseif($status['color'] === 'yellow') bg-yellow-500/20 text-yellow-400
                        @elseif($status['color'] === 'red') bg-red-500/20 text-red-400
                        @else bg-gray-500/20 text-gray-400
                        @endif">
                        {{ $status['label'] }}
                    </span>
                </div>
                <div class="mb-3">
                    <h3 class="text-white font-semibold">{{ $booking->showtime->movie->title }}</h3>
                    <p class="text-gray-400 text-sm">{{ $booking->user->name }}</p>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Jadwal</span>
                    <span class="mobile-card-value">{{ $booking->showtime->show_date->format('d/m/Y') }} {{ $booking->showtime->formatted_time }}</span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Kursi</span>
                    <span class="mobile-card-value">{{ $booking->seat_codes }}</span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Total</span>
                    <span class="mobile-card-value font-semibold text-green-400">{{ $booking->formatted_price }}</span>
                </div>
                <div class="mt-3 pt-3 border-t border-white/10">
                    <a href="{{ route('admin.bookings.show', $booking) }}" class="block w-full px-3 py-2 bg-[#e50914] text-white text-center text-sm rounded-lg hover:opacity-90">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center py-12 text-gray-500">Belum ada pemesanan</div>
        @endforelse
    </div>
    @if($bookings->hasPages())
        <div class="mt-4">
            {{ $bookings->withQueryString()->links() }}
        </div>
    @endif
</div>
</x-layouts.admin>