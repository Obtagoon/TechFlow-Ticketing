<x-layouts.admin title="Laporan Performa Film">
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-white">Laporan Performa Film</h2>
            <p class="text-gray-400 text-sm">Periode: 22 Nov 2024 - 22 Des 2024</p>
        </div>
        <div class="flex gap-2">
            <a href="/admin/reports" class="px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:opacity-90">
                Kembali
            </a>
            <button type="button" class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:opacity-90">
                Download PDF
            </button>
        </div>
    </div>

    <!-- Movies Table -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Performa Film</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="pb-3">No</th>
                        <th class="pb-3">Film</th>
                        <th class="pb-3">Genre</th>
                        <th class="pb-3 text-center">Total Jadwal</th>
                        <th class="pb-3 text-right">Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-gray-400">1</td>
                        <td class="py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://image.tmdb.org/t/p/w92/or06FN3Dka5tuj1yVnS3m7PBNKy.jpg" alt="Avengers" class="w-10 h-14 object-cover rounded">
                                <span class="text-white font-medium">Avengers: Endgame</span>
                            </div>
                        </td>
                        <td class="py-3 text-gray-400">Action, Adventure</td>
                        <td class="py-3 text-gray-400 text-center">24</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 12.500.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-gray-400">2</td>
                        <td class="py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://image.tmdb.org/t/p/w92/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg" alt="Spider-Man" class="w-10 h-14 object-cover rounded">
                                <span class="text-white font-medium">Spider-Man: No Way Home</span>
                            </div>
                        </td>
                        <td class="py-3 text-gray-400">Action, Adventure</td>
                        <td class="py-3 text-gray-400 text-center">20</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 10.200.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-gray-400">3</td>
                        <td class="py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://image.tmdb.org/t/p/w92/8UlWHLMpgZm9bx6QYh0NFoq67TZ.jpg" alt="Dune" class="w-10 h-14 object-cover rounded">
                                <span class="text-white font-medium">Dune: Part Two</span>
                            </div>
                        </td>
                        <td class="py-3 text-gray-400">Sci-Fi, Adventure</td>
                        <td class="py-3 text-gray-400 text-center">18</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 13.500.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-gray-400">4</td>
                        <td class="py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://image.tmdb.org/t/p/w92/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg" alt="Oppenheimer" class="w-10 h-14 object-cover rounded">
                                <span class="text-white font-medium">Oppenheimer</span>
                            </div>
                        </td>
                        <td class="py-3 text-gray-400">Drama, History</td>
                        <td class="py-3 text-gray-400 text-center">15</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 15.000.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-gray-400">5</td>
                        <td class="py-3">
                            <div class="flex items-center gap-3">
                                <img src="https://image.tmdb.org/t/p/w92/pFlaoHTZeyNkG83vxsAJiGzfSsa.jpg" alt="The Batman" class="w-10 h-14 object-cover rounded">
                                <span class="text-white font-medium">The Batman</span>
                            </div>
                        </td>
                        <td class="py-3 text-gray-400">Action, Crime</td>
                        <td class="py-3 text-gray-400 text-center">12</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 6.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layouts.admin>