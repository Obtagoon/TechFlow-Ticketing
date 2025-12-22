<x-layouts.admin title="Edit Film">
<div class="max-w-3xl">
    <a href="/admin/movies" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Edit Film</h2>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Judul Film *</label>
                <input type="text" name="title" value="Avengers: Endgame" required
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
            </div>

            <!-- Synopsis -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Sinopsis</label>
                <textarea name="synopsis" rows="4"
                          class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Duration -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Durasi (menit) *</label>
                    <input type="number" name="duration" value="181" required min="1"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>

                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Rating (0-10)</label>
                    <input type="number" name="rating" value="8.4" min="0" max="10" step="0.1"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Genre -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Genre</label>
                    <input type="text" name="genre" value="Action, Adventure, Drama"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>

                <!-- Release Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal Rilis</label>
                    <input type="date" name="release_date" value="2019-04-26"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                    <option value="coming_soon">Segera Tayang</option>
                    <option value="now_playing" selected>Sedang Tayang</option>
                    <option value="ended">Selesai</option>
                </select>
            </div>

            <!-- Poster -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Poster</label>
                <div class="mb-3">
                    <img src="https://image.tmdb.org/t/p/w200/or06FN3Dka5tuj1yVnS3m7PBNKy.jpg" alt="" class="w-32 h-48 object-cover rounded-lg">
                </div>
                <input type="file" name="poster" accept="image/jpeg,image/png,image/jpg,image/webp"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#e50914] file:text-white file:cursor-pointer">
                <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG, WebP. Maks 2MB</p>
            </div>

            <!-- Backdrop -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Backdrop</label>
                <div class="mb-3">
                    <img src="https://image.tmdb.org/t/p/w780/7RyHsO4yDXtBv1zUU3mTpHeQ0d5.jpg" alt="" class="w-full h-32 object-cover rounded-lg">
                </div>
                <input type="file" name="backdrop" accept="image/jpeg,image/png,image/jpg,image/webp"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#e50914] file:text-white file:cursor-pointer">
                <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG, WebP. Maks 4MB</p>
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="button" class="px-6 py-2.5 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
                    Update Film
                </button>
                <a href="/admin/movies" class="px-6 py-2.5 text-gray-400 hover:text-white transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>