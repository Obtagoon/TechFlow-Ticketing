<x-layouts.admin title="Laporan Penjualan">
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-white">Laporan Penjualan</h2>
            <p class="text-gray-400 text-sm">Periode: 15 Des 2024 - 22 Des 2024</p>
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

    <!-- Summary Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Total Booking</p>
            <p class="text-2xl font-bold text-white mt-1">45</p>
        </div>
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Total Tiket</p>
            <p class="text-2xl font-bold text-white mt-1">128</p>
        </div>
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Total Pendapatan</p>
            <p class="text-2xl font-bold text-green-500 mt-1">Rp 7.650.000</p>
        </div>
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Rata-rata Order</p>
            <p class="text-2xl font-bold text-white mt-1">Rp 170.000</p>
        </div>
    </div>

    <!-- Revenue by Movie -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Pendapatan per Film</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="pb-3">Film</th>
                        <th class="pb-3 text-center">Booking</th>
                        <th class="pb-3 text-center">Tiket</th>
                        <th class="pb-3 text-right">Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">Avengers: Endgame</td>
                        <td class="py-3 text-gray-400 text-center">15</td>
                        <td class="py-3 text-gray-400 text-center">42</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 2.100.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">Spider-Man: No Way Home</td>
                        <td class="py-3 text-gray-400 text-center">12</td>
                        <td class="py-3 text-gray-400 text-center">35</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 1.750.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">Dune: Part Two</td>
                        <td class="py-3 text-gray-400 text-center">10</td>
                        <td class="py-3 text-gray-400 text-center">28</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 2.100.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">Oppenheimer</td>
                        <td class="py-3 text-gray-400 text-center">8</td>
                        <td class="py-3 text-gray-400 text-center">23</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 1.700.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Revenue by Date -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Pendapatan per Hari</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="pb-3">Tanggal</th>
                        <th class="pb-3 text-center">Booking</th>
                        <th class="pb-3 text-right">Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">22 Des 2024</td>
                        <td class="py-3 text-gray-400 text-center">8</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 1.200.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">21 Des 2024</td>
                        <td class="py-3 text-gray-400 text-center">12</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 1.850.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">20 Des 2024</td>
                        <td class="py-3 text-gray-400 text-center">10</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 1.500.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">19 Des 2024</td>
                        <td class="py-3 text-gray-400 text-center">7</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 1.050.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">18 Des 2024</td>
                        <td class="py-3 text-gray-400 text-center">5</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 750.000</td>
                    </tr>
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">17 Des 2024</td>
                        <td class="py-3 text-gray-400 text-center">3</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp 450.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Detail Bookings -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Detail Booking</h3>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px]">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-white/10">
                        <th class="pb-4 pr-4">Kode Booking</th>
                        <th class="pb-4 pr-4">User</th>
                        <th class="pb-4 pr-4">Film</th>
                        <th class="pb-4 pr-4">Bioskop</th>
                        <th class="pb-4 pr-4 text-center">Tiket</th>
                        <th class="pb-4 pr-4 text-right">Total</th>
                        <th class="pb-4 text-right">Waktu Bayar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <tr class="hover:bg-white/5">
                        <td class="py-4 pr-4">
                            <span class="text-white font-mono text-sm bg-white/10 px-2 py-1 rounded">BK20241222001</span>
                        </td>
                        <td class="py-4 pr-4 text-gray-300">Ahmad Rizky</td>
                        <td class="py-4 pr-4 text-gray-300 max-w-[200px] truncate">Avengers: Endgame</td>
                        <td class="py-4 pr-4 text-gray-400 text-sm">Cinema XXI Gandaria City</td>
                        <td class="py-4 pr-4 text-gray-300 text-center">3</td>
                        <td class="py-4 pr-4 text-right">
                            <span class="text-green-500 font-semibold">Rp 150.000</span>
                        </td>
                        <td class="py-4 text-right text-gray-400 text-sm whitespace-nowrap">22 Des 2024 10:30</td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="py-4 pr-4">
                            <span class="text-white font-mono text-sm bg-white/10 px-2 py-1 rounded">BK20241222002</span>
                        </td>
                        <td class="py-4 pr-4 text-gray-300">Siti Nurhaliza</td>
                        <td class="py-4 pr-4 text-gray-300 max-w-[200px] truncate">Spider-Man: No Way Home</td>
                        <td class="py-4 pr-4 text-gray-400 text-sm">Cinema XXI Gandaria City</td>
                        <td class="py-4 pr-4 text-gray-300 text-center">2</td>
                        <td class="py-4 pr-4 text-right">
                            <span class="text-green-500 font-semibold">Rp 100.000</span>
                        </td>
                        <td class="py-4 text-right text-gray-400 text-sm whitespace-nowrap">22 Des 2024 11:15</td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="py-4 pr-4">
                            <span class="text-white font-mono text-sm bg-white/10 px-2 py-1 rounded">BK20241221001</span>
                        </td>
                        <td class="py-4 pr-4 text-gray-300">Budi Santoso</td>
                        <td class="py-4 pr-4 text-gray-300 max-w-[200px] truncate">Dune: Part Two</td>
                        <td class="py-4 pr-4 text-gray-400 text-sm">Cinema XXI Gandaria City</td>
                        <td class="py-4 pr-4 text-gray-300 text-center">4</td>
                        <td class="py-4 pr-4 text-right">
                            <span class="text-green-500 font-semibold">Rp 300.000</span>
                        </td>
                        <td class="py-4 text-right text-gray-400 text-sm whitespace-nowrap">21 Des 2024 14:20</td>
                    </tr>
                    <tr class="hover:bg-white/5">
                        <td class="py-4 pr-4">
                            <span class="text-white font-mono text-sm bg-white/10 px-2 py-1 rounded">BK20241221002</span>
                        </td>
                        <td class="py-4 pr-4 text-gray-300">Dewi Lestari</td>
                        <td class="py-4 pr-4 text-gray-300 max-w-[200px] truncate">Oppenheimer</td>
                        <td class="py-4 pr-4 text-gray-400 text-sm">CGV Grand Indonesia</td>
                        <td class="py-4 pr-4 text-gray-300 text-center">2</td>
                        <td class="py-4 pr-4 text-right">
                            <span class="text-green-500 font-semibold">Rp 200.000</span>
                        </td>
                        <td class="py-4 text-right text-gray-400 text-sm whitespace-nowrap">21 Des 2024 16:45</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layouts.admin>