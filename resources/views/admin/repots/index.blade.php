<x-layouts.admin title="Laporan">
<div class="grid md:grid-cols-2 gap-6">
    <!-- Sales Report -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Laporan Penjualan</h2>
        <p class="text-gray-400 text-sm mb-6">Generate laporan penjualan tiket berdasarkan rentang tanggal</p>
        
        <form action="/admin/reports/sales" method="GET" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" required value="2024-12-15"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Akhir</label>
                    <input type="date" name="end_date" required value="2024-12-22"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
            </div>
            <div class="flex gap-2">
                <a href="/admin/reports/sales" class="px-4 py-2 bg-[#e50914] text-white font-medium rounded-lg hover:opacity-90">
                    Lihat Laporan
                </a>
                <button type="button" class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:opacity-90">
                    Download PDF
                </button>
            </div>
        </form>
    </div>

    <!-- Movie Report -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Laporan Performa Film</h2>
        <p class="text-gray-400 text-sm mb-6">Generate laporan performa film berdasarkan penjualan tiket</p>
        
        <form action="/admin/reports/movies" method="GET" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" required value="2024-11-22"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Akhir</label>
                    <input type="date" name="end_date" required value="2024-12-22"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
                </div>
            </div>
            <div class="flex gap-2">
                <a href="/admin/reports/movies" class="px-4 py-2 bg-[#e50914] text-white font-medium rounded-lg hover:opacity-90">
                    Lihat Laporan
                </a>
                <button type="button" class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:opacity-90">
                    Download PDF
                </button>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin