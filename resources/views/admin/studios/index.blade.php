<x-layouts.admin title="Kelola Studio">
<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.studios.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
        + Tambah Studio
    </a>
</div>

<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                    <th class="px-6 py-4 font-medium">Studio</th>
                    <th class="px-6 py-4 font-medium">Bioskop</th>
                    <th class="px-6 py-4 font-medium">Tipe</th>
                    <th class="px-6 py-4 font-medium">Kapasitas</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($studios as $studio)
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4 text-white font-medium">{{ $studio->name }}</td>
                        <td class="px-6 py-4 text-gray-300">{{ $studio->cinema->name }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs rounded-full">
                                {{ $studio->type_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-300">
                            {{ $studio->capacity }} kursi ({{ $studio->rows }}x{{ $studio->seats_per_row }})
                        </td>
                        <td class="px-6 py-4">
                            @if($studio->is_active)
                                <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Aktif</span>
                            @else
                                <span class="px-2 py-1 bg-red-500/20 text-red-400 text-xs rounded-full">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.studios.edit', $studio) }}" class="p-2 text-gray-400 hover:text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form id="delete-studio-{{ $studio->id }}" action="{{ route('admin.studios.destroy', $studio) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" @click="confirmModal('delete-studio-{{ $studio->id }}')" class="p-2 text-gray-400 hover:text-red-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada studio</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($studios->hasPages())
        <div class="px-6 py-4 border-t border-white/10">
            {{ $studios->links() }}
        </div>
    @endif
</div>
</x-layouts.admin>