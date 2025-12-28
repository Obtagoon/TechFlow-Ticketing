<x-layouts.admin title="Kelola Pemesanan">
<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="flex flex-wrap items-center gap-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode booking..."
               class="flex-1 min-w-[200px] px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
        <select name="status" onchange="this.form.submit()" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Status</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu Bayar</option>
            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Dibayar</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Kadaluarsa</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-[#e50914] text-white rounded-lg">Cari</button>
    </form>
</div>

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
</x-layouts.admin>