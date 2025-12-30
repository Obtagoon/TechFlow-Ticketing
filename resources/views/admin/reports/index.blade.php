<x-layouts.admin title="Laporan">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Sales Report -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Laporan Penjualan</h2>
        <p class="text-gray-400 text-sm mb-6">Generate laporan penjualan tiket berdasarkan rentang tanggal</p>
        
        <form action="{{ route('admin.reports.sales') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" required value="{{ now()->subDays(7)->format('Y-m-d') }}"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Akhir</label>
                    <input type="date" name="end_date" required value="{{ now()->format('Y-m-d') }}"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-[#e50914] text-white text-sm font-medium rounded-lg hover:opacity-90">
                    Lihat Laporan
                </button>
                <button type="submit" name="download" value="1" class="flex-1 px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:opacity-90">
                    Download PDF
                </button>
            </div>
        </form>
    </div>

    <!-- Movie Report -->
    <div class="bg-[#16162a] rounded-xl border border-white/10 p-4 sm:p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Laporan Performa Film</h2>
        <p class="text-gray-400 text-sm mb-6">Generate laporan performa film berdasarkan penjualan tiket</p>
        
        <form action="{{ route('admin.reports.movies') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Mulai</label>
                    <input type="date" name="start_date" required value="{{ now()->subMonth()->format('Y-m-d') }}"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Tanggal Akhir</label>
                    <input type="date" name="end_date" required value="{{ now()->format('Y-m-d') }}"
                           class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-[#e50914] text-white text-sm font-medium rounded-lg hover:opacity-90">
                    Lihat Laporan
                </button>
                <button type="submit" name="download" value="1" class="flex-1 px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:opacity-90">
                    Download PDF
                </button>
            </div>
        </form>
    </div>
</div>
</x-layouts.admin>