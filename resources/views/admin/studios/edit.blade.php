<x-layouts.admin title="Edit Studio">
<div class="max-w-2xl">
    <a href="/admin/studios" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Edit Studio</h2>
        </div>

        <form action="#" method="POST" class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Bioskop *</label>
                <select name="cinema_id" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                    <option value="">Pilih Bioskop</option>
                    <option value="1" selected>Cinema XXI Gandaria City</option>
                    <option value="2">CGV Grand Indonesia</option>
                    <option value="3">Cinepolis Lippo Mall Puri</option>
                </select>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Nama Studio *</label>
                    <input type="text" name="name" value="Studio 1" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tipe *</label>
                    <select name="type" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                        <option value="regular" selected>Regular 2D</option>
                        <option value="imax">IMAX</option>
                        <option value="premiere">Premiere</option>
                        <option value="4dx">4DX</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Jumlah Baris *</label>
                    <input type="number" name="rows" value="10" required min="1" max="26"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Kursi per Baris *</label>
                    <input type="number" name="seats_per_row" value="15" required min="1"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
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
                    Update
                </button>
                <a href="/admin/studios" class="px-6 py-2.5 text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>