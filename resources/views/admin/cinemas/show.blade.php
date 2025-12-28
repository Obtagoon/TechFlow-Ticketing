<x-layouts.admin title="Detail Bioskop">
<div class="max-w-4xl">
    <a href="{{ route('admin.cinemas.index') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Detail Bioskop</h2>
            @if($cinema->is_active)
                <span class="px-3 py-1 bg-green-500/20 text-green-400 text-sm rounded-full">Aktif</span>
            @else
                <span class="px-3 py-1 bg-red-500/20 text-red-400 text-sm rounded-full">Nonaktif</span>
            @endif
        </div>

        <div class="p-6 space-y-6">
            <!-- Cinema Info -->
            <div class="flex gap-6">
                @if($cinema->image)
                    <img src="{{ $cinema->image_url }}" alt="{{ $cinema->name }}" class="w-32 h-32 object-cover rounded-xl">
                @else
                    <div class="w-32 h-32 bg-white/10 rounded-xl flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                @endif
                <div class="space-y-3">
                    <h3 class="text-xl font-bold text-white">{{ $cinema->name }}</h3>
                    <div class="space-y-1">
                        <p class="text-gray-400 text-sm">
                            <span class="text-gray-500">Kota:</span> {{ $cinema->city }}
                        </p>
                        <p class="text-gray-400 text-sm">
                            <span class="text-gray-500">Alamat:</span> {{ $cinema->address }}
                        </p>
                        @if($cinema->phone)
                            <p class="text-gray-400 text-sm">
                                <span class="text-gray-500">Telepon:</span> {{ $cinema->phone }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Studios -->
            <div>
                <h3 class="font-medium text-white mb-4">Studio ({{ $cinema->studios->count() }})</h3>
                @if($cinema->studios->count() > 0)
                    <div class="grid gap-4">
                        @foreach($cinema->studios as $studio)
                            <div class="bg-[#0f0f1a] rounded-lg p-4 border border-white/5">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <p class="text-white font-medium">{{ $studio->name }}</p>
                                        <p class="text-gray-500 text-sm">{{ $studio->type_label }} • {{ $studio->capacity }} kursi</p>
                                    </div>
                                    <a href="{{ route('admin.studios.edit', $studio) }}" class="text-[#e50914] hover:underline text-sm">
                                        Edit
                                    </a>
                                </div>
                                
                                @if($studio->showtimes->count() > 0)
                                    <div class="mt-3 pt-3 border-t border-white/5">
                                        <p class="text-gray-500 text-xs mb-2">Jadwal Tayang Mendatang:</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($studio->showtimes->take(5) as $showtime)
                                                <span class="px-2 py-1 bg-white/5 rounded text-xs text-gray-300">
                                                    {{ $showtime->movie->title }} - {{ $showtime->show_date->format('d/m') }} {{ $showtime->formatted_time }}
                                                </span>
                                            @endforeach
                                            @if($studio->showtimes->count() > 5)
                                                <span class="px-2 py-1 text-xs text-gray-500">+{{ $studio->showtimes->count() - 5 }} lainnya</span>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <p class="text-gray-500 text-xs mt-2">Tidak ada jadwal tayang mendatang</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-sm">Belum ada studio</p>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex gap-4 pt-4 border-t border-white/10">
                <a href="{{ route('admin.cinemas.edit', $cinema) }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white rounded-lg hover:opacity-90">
                    Edit Bioskop
                </a>
                <form id="delete-cinema-{{ $cinema->id }}" action="{{ route('admin.cinemas.destroy', $cinema) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" @click="confirmModal('delete-cinema-{{ $cinema->id }}')" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-90">
                    Hapus Bioskop
                </button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>
