<x-layouts.admin :title="isset($studio) ? 'Edit Studio' : 'Tambah Studio'">
<div class="max-w-2xl">
    <a href="{{ route('admin.studios.index') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">{{ isset($studio) ? 'Edit Studio' : 'Tambah Studio Baru' }}</h2>
        </div>

        <form action="{{ isset($studio) ? route('admin.studios.update', $studio) : route('admin.studios.store') }}" 
              method="POST" class="p-6 space-y-6">
            @csrf
            @if(isset($studio))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Bioskop *</label>
                <select name="cinema_id" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                    <option value="">Pilih Bioskop</option>
                    @foreach($cinemas as $cinema)
                        <option value="{{ $cinema->id }}" {{ old('cinema_id', $studio->cinema_id ?? '') == $cinema->id ? 'selected' : '' }}>
                            {{ $cinema->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nama Studio *</label>
                    <input type="text" name="name" value="{{ old('name', $studio->name ?? '') }}" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tipe *</label>
                    <select name="type" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                        <option value="regular" {{ old('type', $studio->type ?? '') == 'regular' ? 'selected' : '' }}>Regular 2D</option>
                        <option value="imax" {{ old('type', $studio->type ?? '') == 'imax' ? 'selected' : '' }}>IMAX</option>
                        <option value="premiere" {{ old('type', $studio->type ?? '') == 'premiere' ? 'selected' : '' }}>Premiere</option>
                        <option value="4dx" {{ old('type', $studio->type ?? '') == '4dx' ? 'selected' : '' }}>4DX</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Jumlah Baris *</label>
                    <input type="number" name="rows" value="{{ old('rows', $studio->rows ?? 10) }}" required min="1" max="26"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Kursi per Baris *</label>
                    <input type="number" name="seats_per_row" value="{{ old('seats_per_row', $studio->seats_per_row ?? 12) }}" required min="1"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
            </div>

            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $studio->is_active ?? true) ? 'checked' : '' }}
                           class="rounded border-white/20 bg-[#0f0f1a] text-[#e50914]">
                    <span class="text-gray-300">Aktif</span>
                </label>
            </div>

            <div class="flex gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
                    {{ isset($studio) ? 'Update' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.studios.index') }}" class="px-6 py-2.5 text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>