<x-layouts.admin title="Tambah Bioskop">
<div class="max-w-2xl">
    <a href="/admin/cinemas" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Tambah Bioskop Baru</h2>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Bioskop *</label>
                <input type="text" name="name" required
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:ring-2 focus:ring-[#e50914]">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Alamat *</label>
                <textarea name="address" rows="2" required
                          class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:ring-2 focus:ring-[#e50914]"></textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Kota *</label>
                    <input type="text" name="city" required
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:ring-2 focus:ring-[#e50914]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Telepon</label>
                    <input type="text" name="phone"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:ring-2 focus:ring-[#e50914]">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Gambar</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#e50914] file:text-white">
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
                <a href="/admin/cinemas" class="px-6 py-2.5 text-gray-400 hover:text-white">Batal</a>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>