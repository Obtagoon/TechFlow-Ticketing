<x-layouts.admin title="Tambah Jadwal">
<div class="max-w-2xl">
    <a href="/admin/showtimes" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Tambah Jadwal Baru</h2>
        </div>

        <form action="#" method="POST" class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Film *</label>
                <select name="movie_id" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                    <option value="">Pilih Film</option>
                    <option value="1">Avengers: Endgame</option>
                    <option value="2">Spider-Man: No Way Home</option>
                    <option value="3">Dune: Part Two</option>
                    <option value="4">Oppenheimer</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Studio *</label>
                <select name="studio_id" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                    <option value="">Pilih Studio</option>
                    <option value="1">Cinema XXI Gandaria City - Studio 1 (Regular)</option>
                    <option value="2">Cinema XXI Gandaria City - Studio 2 (Regular)</option>
                    <option value="3">Cinema XXI Gandaria City - Studio 3 (IMAX)</option>
                    <option value="4">CGV Grand Indonesia - Velvet (Premiere)</option>
                </select>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal *</label>
                    <input type="date" name="show_date" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Jam *</label>
                    <input type="time" name="show_time" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Harga (Rp) *</label>
                <input type="number" name="price" value="50000" required min="0"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            </div>

            <div>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" checked
                           class="rounded border-white/20 bg-[#0f0f1a] text-[#e50914]">
                    <span class="text-gray-300">Aktif</span>
                </label>
            </div>

            <div class="flex gap-4 pt-4 border-t border-white/10">
                <button type="button" class="px-6 py-2.5 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90">
                    Simpan
                </button>
                <a href="/admin/showtimes" class="px-6 py-2.5 text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>