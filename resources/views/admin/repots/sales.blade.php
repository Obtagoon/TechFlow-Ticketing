<x-layouts.admin title="Laporan Penjualan">
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-white">Laporan Penjualan</h2>
            <p class="text-gray-400 text-sm">Periode: {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.reports.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded-lg hover:opacity-90">
                Kembali
            </a>
            <a href="{{ route('admin.reports.sales', ['start_date' => $startDate->format('Y-m-d'), 'end_date' => $endDate->format('Y-m-d'), 'download' => 1]) }}" 
               class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:opacity-90">
                Download PDF
            </a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Total Booking</p>
            <p class="text-2xl font-bold text-white mt-1">{{ number_format($summary['total_bookings']) }}</p>
        </div>
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Total Tiket</p>
            <p class="text-2xl font-bold text-white mt-1">{{ number_format($summary['total_tickets']) }}</p>
        </div>
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Total Pendapatan</p>
            <p class="text-2xl font-bold text-green-500 mt-1">Rp {{ number_format($summary['total_revenue'], 0, ',', '.') }}</p>
        </div>
        <div class="bg-[#16162a] rounded-xl border border-white/10 p-4">
            <p class="text-gray-400 text-sm">Rata-rata Order</p>
            <p class="text-2xl font-bold text-white mt-1">Rp {{ number_format($summary['avg_order_value'], 0, ',', '.') }}</p>
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
                    @forelse ($revenueByMovie as $item)
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">{{ $item['movie'] }}</td>
                        <td class="py-3 text-gray-400 text-center">{{ $item['bookings'] }}</td>
                        <td class="py-3 text-gray-400 text-center">{{ $item['tickets'] }}</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp {{ number_format($item['revenue'], 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-400">Tidak ada data</td>
                    </tr>
                    @endforelse
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
                    @forelse ($revenueByDate as $item)
                    <tr class="border-b border-white/5">
                        <td class="py-3 text-white">{{ $item['date'] }}</td>
                        <td class="py-3 text-gray-400 text-center">{{ $item['bookings'] }}</td>
                        <td class="py-3 text-green-500 text-right font-medium">Rp {{ number_format($item['revenue'], 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-400">Tidak ada data</td>
                    </tr>
                    @endforelse
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
                    @forelse ($bookings as $booking)
                    <tr class="hover:bg-white/5">
                        <td class="py-4 pr-4">
                            <span class="text-white font-mono text-sm bg-white/10 px-2 py-1 rounded">{{ $booking->booking_code }}</span>
                        </td>
                        <td class="py-4 pr-4 text-gray-300">{{ $booking->user->name }}</td>
                        <td class="py-4 pr-4 text-gray-300 max-w-[200px] truncate">{{ $booking->showtime->movie->title }}</td>
                        <td class="py-4 pr-4 text-gray-400 text-sm">{{ $booking->showtime->studio->cinema->name }}</td>
                        <td class="py-4 pr-4 text-gray-300 text-center">{{ $booking->total_seats }}</td>
                        <td class="py-4 pr-4 text-right">
                            <span class="text-green-500 font-semibold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
                        </td>
                        <td class="py-4 text-right text-gray-400 text-sm whitespace-nowrap">{{ $booking->paid_at->format('d M Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-gray-400">Tidak ada data booking</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layouts.admin>
