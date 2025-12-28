{{-- Booking Table Partial for AJAX Response --}}
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
                    @elseif($status['color'] === 'blue') bg-blue-500/20 text-blue-400
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

@if($bookings->hasPages())
    <div class="px-6 py-4 border-t border-white/10">
        {{ $bookings->withQueryString()->links() }}
    </div>
@endif
