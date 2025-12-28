<!-- Showtime Table Partial for AJAX Response -->
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

@if($showtimes->hasPages())
    <div class="px-6 py-4 border-t border-white/10">
        {{ $showtimes->withQueryString()->links() }}
    </div>
@endif
