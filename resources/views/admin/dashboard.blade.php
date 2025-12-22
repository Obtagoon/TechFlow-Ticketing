<x-layouts.admin title="Dashboard">
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Film</p>
                <p class="text-3xl font-bold text-white mt-1">42</p>
                <p class="text-sm text-gray-500 mt-1">8 sedang tayang</p>
            </div>
            <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Pemesanan</p>
                <p class="text-3xl font-bold text-white mt-1">1,234</p>
                <p class="text-sm text-gray-500 mt-1">28 hari ini</p>
            </div>
            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Pendapatan</p>
                <p class="text-2xl font-bold text-white mt-1">Rp 125.500.000</p>
                <p class="text-sm text-green-400 mt-1">+Rp 2.350.000 hari ini</p>
            </div>
            <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total User</p>
                <p class="text-3xl font-bold text-white mt-1">856</p>
                <p class="text-sm text-gray-500 mt-1">5 bioskop</p>
            </div>
            <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-3 gap-8">
    <!-- Recent Bookings -->
    <div class="lg:col-span-2 bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-white">Pemesanan Terbaru</h2>
                <a href="#" class="text-sm text-[#e50914] hover:underline">Lihat Semua</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="px-6 py-3 font-medium">Kode</th>
                        <th class="px-6 py-3 font-medium">User</th>
                        <th class="px-6 py-3 font-medium">Film</th>
                        <th class="px-6 py-3 font-medium">Total</th>
                        <th class="px-6 py-3 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4 font-mono text-sm text-white">BK20231222001</td>
                        <td class="px-6 py-4 text-gray-300">John Doe</td>
                        <td class="px-6 py-4 text-gray-300">Avengers: Endgame</td>
                        <td class="px-6 py-4 text-white">Rp 150.000</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Confirmed</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4 font-mono text-sm text-white">BK20231222002</td>
                        <td class="px-6 py-4 text-gray-300">Jane Smith</td>
                        <td class="px-6 py-4 text-gray-300">Spider-Man: No Way...</td>
                        <td class="px-6 py-4 text-white">Rp 225.000</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">Pending</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4 font-mono text-sm text-white">BK20231222003</td>
                        <td class="px-6 py-4 text-gray-300">Ahmad Wisnu</td>
                        <td class="px-6 py-4 text-gray-300">The Batman</td>
                        <td class="px-6 py-4 text-white">Rp 100.000</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Confirmed</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4 font-mono text-sm text-white">BK20231222004</td>
                        <td class="px-6 py-4 text-gray-300">Siti Rahma</td>
                        <td class="px-6 py-4 text-gray-300">Black Panther: Wak...</td>
                        <td class="px-6 py-4 text-white">Rp 175.000</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">Cancelled</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="px-6 py-4 font-mono text-sm text-white">BK20231222005</td>
                        <td class="px-6 py-4 text-gray-300">Budi Santoso</td>
                        <td class="px-6 py-4 text-gray-300">Guardians of the G...</td>
                        <td class="px-6 py-4 text-white">Rp 300.000</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Confirmed</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Popular Movies -->
    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Film Populer Minggu Ini</h2>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center gap-4">
                <span class="w-6 h-6 flex items-center justify-center rounded-full bg-[#e50914] text-white text-sm font-bold">1</span>
                <img src="https://image.tmdb.org/t/p/w92/or06FN3Dka5tuj6HVohdJyH8JYM.jpg" alt="" class="w-12 h-16 object-cover rounded">
                <div class="flex-1 min-w-0">
                    <p class="text-white font-medium truncate">Avengers: Endgame</p>
                    <p class="text-sm text-gray-400">156 pemesanan</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="w-6 h-6 flex items-center justify-center rounded-full bg-[#e50914] text-white text-sm font-bold">2</span>
                <img src="https://image.tmdb.org/t/p/w92/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg" alt="" class="w-12 h-16 object-cover rounded">
                <div class="flex-1 min-w-0">
                    <p class="text-white font-medium truncate">Spider-Man: No Way Home</p>
                    <p class="text-sm text-gray-400">143 pemesanan</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="w-6 h-6 flex items-center justify-center rounded-full bg-[#e50914] text-white text-sm font-bold">3</span>
                <img src="https://image.tmdb.org/t/p/w92/74xTEgt7R36Fvdl8O2Q1kXh1kkl.jpg" alt="" class="w-12 h-16 object-cover rounded">
                <div class="flex-1 min-w-0">
                    <p class="text-white font-medium truncate">The Batman</p>
                    <p class="text-sm text-gray-400">128 pemesanan</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/10 text-gray-400 text-sm font-bold">4</span>
                <img src="https://image.tmdb.org/t/p/w92/sv1xJUazXeYqALKwvdM22HaZl2c.jpg" alt="" class="w-12 h-16 object-cover rounded">
                <div class="flex-1 min-w-0">
                    <p class="text-white font-medium truncate">Black Panther: Wakanda Forever</p>
                    <p class="text-sm text-gray-400">97 pemesanan</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="w-6 h-6 flex items-center justify-center rounded-full bg-white/10 text-gray-400 text-sm font-bold">5</span>
                <img src="https://image.tmdb.org/t/p/w92/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg" alt="" class="w-12 h-16 object-cover rounded">
                <div class="flex-1 min-w-0">
                    <p class="text-white font-medium truncate">Guardians of the Galaxy Vol. 3</p>
                    <p class="text-sm text-gray-400">85 pemesanan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Revenue Chart -->
<div class="mt-8 bg-[#16162a] rounded-xl border border-white/10 p-6">
    <h2 class="text-lg font-semibold text-white mb-6">Pendapatan 7 Hari Terakhir</h2>
    <div class="h-64 flex items-end justify-between gap-4">
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 45%;" title="Rp 15.500.000"></div>
            <span class="text-xs text-gray-400">Sen</span>
        </div>
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 65%;" title="Rp 22.300.000"></div>
            <span class="text-xs text-gray-400">Sel</span>
        </div>
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 35%;" title="Rp 12.100.000"></div>
            <span class="text-xs text-gray-400">Rab</span>
        </div>
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 80%;" title="Rp 27.500.000"></div>
            <span class="text-xs text-gray-400">Kam</span>
        </div>
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 100%;" title="Rp 34.250.000"></div>
            <span class="text-xs text-gray-400">Jum</span>
        </div>
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 90%;" title="Rp 31.000.000"></div>
            <span class="text-xs text-gray-400">Sab</span>
        </div>
        <div class="flex-1 flex flex-col items-center gap-2">
            <div class="w-full bg-gradient-to-t from-[#e50914] to-[#e50914]/50 rounded-t-lg transition-all hover:opacity-80" style="height: 55%;" title="Rp 18.850.000"></div>
            <span class="text-xs text-gray-400">Min</span>
        </div>
    </div>
</div>
</x-layouts.admin>