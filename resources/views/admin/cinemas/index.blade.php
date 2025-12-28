<x-layouts.admin title="Kelola Bioskop">
<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.cinemas.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
        + Tambah Bioskop
    </a>
</div>

<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                    <th class="px-6 py-4 font-medium">Bioskop</th>
                    <th class="px-6 py-4 font-medium">Kota</th>
                    <th class="px-6 py-4 font-medium">Telepon</th>
                    <th class="px-6 py-4 font-medium">Studio</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($cinemas as $cinema)
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($cinema->image)
                                    <img src="{{ $cinema->image_url }}" alt="" class="w-12 h-12 object-cover rounded-lg">
                                @else
                                    <div class="w-12 h-12 bg-white/10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="text-white font-medium">{{ $cinema->name }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($cinema->address, 30) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-300">{{ $cinema->city }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $cinema->phone ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $cinema->studios->count() }} studio</td>
                        <td class="px-6 py-4">
                            @if($cinema->is_active)
                                <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Aktif</span>
                            @else
                                <span class="px-2 py-1 bg-red-500/20 text-red-400 text-xs rounded-full">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.cinemas.edit', $cinema) }}" class="p-2 text-gray-400 hover:text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form id="delete-cinema-{{ $cinema->id }}" action="{{ route('admin.cinemas.destroy', $cinema) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" @click="confirmModal('delete-cinema-{{ $cinema->id }}')" class="p-2 text-gray-400 hover:text-red-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada bioskop</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($cinemas->hasPages())
        <div class="px-6 py-4 border-t border-white/10">
            {{ $cinemas->links() }}
        </div>
    @endif
</div>
</x-layouts.admin>