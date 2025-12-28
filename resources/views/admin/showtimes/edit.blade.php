<x-layouts.admin :title="isset($showtime) ? 'Edit Jadwal' : 'Tambah Jadwal'">
<div class="max-w-2xl">
    <a href="{{ route('admin.showtimes.index') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">{{ isset($showtime) ? 'Edit Jadwal' : 'Tambah Jadwal Baru' }}</h2>
        </div>

        <form action="{{ isset($showtime) ? route('admin.showtimes.update', $showtime) : route('admin.showtimes.store') }}" 
              method="POST" class="p-6 space-y-6">
            @csrf
            @if(isset($showtime))
                @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Film *</label>
                <select name="movie_id" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                    <option value="">Pilih Film</option>
                    @foreach($movies as $movie)
                        <option value="{{ $movie->id }}" {{ old('movie_id', $showtime->movie_id ?? '') == $movie->id ? 'selected' : '' }}>
                            {{ $movie->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Studio *</label>
                <select name="studio_id" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                    <option value="">Pilih Studio</option>
                    @foreach($studios as $studio)
                        <option value="{{ $studio->id }}" {{ old('studio_id', $showtime->studio_id ?? '') == $studio->id ? 'selected' : '' }}>
                            {{ $studio->cinema->name }} - {{ $studio->name }} ({{ $studio->type_label }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal *</label>
                    <input type="date" name="show_date" value="{{ old('show_date', isset($showtime) ? $showtime->show_date->format('Y-m-d') : '') }}" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Jam *</label>
                    <input type="time" name="show_time" value="{{ old('show_time', $showtime->show_time ?? '') }}" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Harga (Rp) *</label>
                <input type="number" name="price" value="{{ old('price', $showtime->price ?? 50000) }}" required min="0"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            </div>

            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $showtime->is_active ?? true) ? 'checked' : '' }}
                           class="rounded border-white/20 bg-[#0f0f1a] text-[#e50914]">
                    <span class="text-gray-300">Aktif</span>
                </label>
            </div>

            <div class="flex gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
                    {{ isset($showtime) ? 'Update' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.showtimes.index') }}" class="px-6 py-2.5 text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>