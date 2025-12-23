<x-layouts.admin title="Kelola Pemesanan">
<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="flex flex-wrap items-center gap-4">
        <input type="text" name="search" placeholder="Cari kode booking..."
               class="flex-1 min-w-[200px] px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
        <select name="status" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Status</option>
            <option value="pending">Menunggu Bayar</option>
            <option value="paid">Dibayar</option>
            <option value="cancelled">Dibatalkan</option>
            <option value="expired">Kadaluarsa</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-[#e50914] text-white rounded-lg">Cari</button>
    </form>
</div>

<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                    <th class="px-6 py-4 font-medium">Kode</th>
                    <th class="px-6 py-4 font-medium">User</th>
                    <th class="px-6 py-4 font-medium">Film</th>
                    <th class="px-6 py-4 font-medium">Jadwal</th>
                    <th class="px-6 py-4 font-medium">Kursi</th>
                    <th class="px-6 py-4 font-medium">Total</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <!-- Booking 1 - Paid -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 font-mono text-sm text-white">BK20241222001</td>
                    <td class="px-6 py-4 text-gray-300">Ahmad Rizky</td>
                    <td class="px-6 py-4 text-gray-300">Avengers: Endgame</td>
                    <td class="px-6 py-4 text-gray-300">22/12/2024 14:30</td>
                    <td class="px-6 py-4 text-white">A1, A2, A3</td>
                    <td class="px-6 py-4 text-white">Rp 150.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Dibayar</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/bookings/1" class="text-[#e50914] hover:underline text-sm">Detail</a>
                    </td>
                </tr>
                
                <!-- Booking 2 - Waiting Confirmation -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 font-mono text-sm text-white">BK20241222002</td>
                    <td class="px-6 py-4 text-gray-300">Siti Nurhaliza</td>
                    <td class="px-6 py-4 text-gray-300">Spider-Man: No Way...</td>
                    <td class="px-6 py-4 text-gray-300">22/12/2024 17:00</td>
                    <td class="px-6 py-4 text-white">B5, B6</td>
                    <td class="px-6 py-4 text-white">Rp 100.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400">Menunggu Konfirmasi</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/bookings/2" class="text-[#e50914] hover:underline text-sm">Detail</a>
                    </td>
                </tr>
                
                <!-- Booking 3 - Pending -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 font-mono text-sm text-white">BK20241222003</td>
                    <td class="px-6 py-4 text-gray-300">Budi Santoso</td>
                    <td class="px-6 py-4 text-gray-300">The Batman</td>
                    <td class="px-6 py-4 text-gray-300">23/12/2024 19:30</td>
                    <td class="px-6 py-4 text-white">C10</td>
                    <td class="px-6 py-4 text-white">Rp 50.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">Menunggu Bayar</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/bookings/3" class="text-[#e50914] hover:underline text-sm">Detail</a>
                    </td>
                </tr>
                
                <!-- Booking 4 - Cancelled -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 font-mono text-sm text-white">BK20241221001</td>
                    <td class="px-6 py-4 text-gray-300">Dewi Lestari</td>
                    <td class="px-6 py-4 text-gray-300">Dune: Part Two</td>
                    <td class="px-6 py-4 text-gray-300">21/12/2024 20:00</td>
                    <td class="px-6 py-4 text-white">D3, D4</td>
                    <td class="px-6 py-4 text-white">Rp 100.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-500/20 text-red-400">Dibatalkan</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/bookings/4" class="text-[#e50914] hover:underline text-sm">Detail</a>
                    </td>
                </tr>
                
                <!-- Booking 5 - Expired -->
                <tr class="hover:bg-white/5">
                    <td class="px-6 py-4 font-mono text-sm text-white">BK20241220001</td>
                    <td class="px-6 py-4 text-gray-300">Eko Prasetyo</td>
                    <td class="px-6 py-4 text-gray-300">Oppenheimer</td>
                    <td class="px-6 py-4 text-gray-300">20/12/2024 15:00</td>
                    <td class="px-6 py-4 text-white">E7, E8, E9</td>
                    <td class="px-6 py-4 text-white">Rp 150.000</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-500/20 text-gray-400">Kadaluarsa</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/bookings/5" class="text-[#e50914] hover:underline text-sm">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-white/10">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-400">Menampilkan 1 - 5 dari 25 pemesanan</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">Previous</button>
                <button class="px-3 py-1 bg-[#e50914] rounded text-white">1</button>
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">2</button>
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">3</button>
                <button class="px-3 py-1 bg-[#0f0f1a] border border-white/10 rounded text-gray-400 hover:bg-white/10">Next</button>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>