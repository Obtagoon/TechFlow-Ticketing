<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan - TechFlow Ticketing</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; font-size: 12px; color: #333; }
        .header { background: #e50914; color: white; padding: 20px; text-align: center; }
        .header h1 { font-size: 20px; margin-bottom: 5px; }
        .header p { font-size: 12px; opacity: 0.9; }
        .content { padding: 20px; }
        .summary { display: flex; margin-bottom: 20px; }
        .summary-box { flex: 1; background: #f5f5f5; padding: 15px; margin-right: 10px; border-radius: 5px; }
        .summary-box:last-child { margin-right: 0; }
        .summary-box h3 { font-size: 11px; color: #666; margin-bottom: 5px; }
        .summary-box p { font-size: 16px; font-weight: bold; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f5f5f5; font-weight: 600; color: #333; font-size: 11px; }
        td { font-size: 11px; }
        .text-right { text-align: right; }
        .status-paid { color: #22c55e; }
        .status-pending { color: #eab308; }
        .status-cancelled { color: #ef4444; }
        .footer { margin-top: 30px; padding-top: 15px; border-top: 1px solid #eee; font-size: 10px; color: #666; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>TechFlow Ticketing</h1>
        <p>Laporan Penjualan</p>
    </div>
    
    <div class="content">
        <p style="margin-bottom: 20px;">
            <strong>Periode:</strong> {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}<br>
            <strong>Dibuat:</strong> {{ now()->format('d M Y, H:i') }}
        </p>

        <table style="margin-bottom: 20px;">
            <tr>
                <td style="background: #f5f5f5; width: 25%;">
                    <strong>Total Transaksi</strong><br>
                    <span style="font-size: 18px; font-weight: bold;">{{ $summary['total_bookings'] }}</span>
                </td>
                <td style="background: #f5f5f5; width: 25%;">
                    <strong>Total Tiket</strong><br>
                    <span style="font-size: 18px; font-weight: bold; color: #22c55e;">{{ $summary['total_tickets'] }}</span>
                </td>
                <td style="background: #f5f5f5; width: 25%;">
                    <strong>Rata-rata Order</strong><br>
                    <span style="font-size: 18px; font-weight: bold;">Rp {{ number_format($summary['avg_order_value'], 0, ',', '.') }}</span>
                </td>
                <td style="background: #f5f5f5; width: 25%;">
                    <strong>Total Pendapatan</strong><br>
                    <span style="font-size: 18px; font-weight: bold; color: #e50914;">Rp {{ number_format($summary['total_revenue'], 0, ',', '.') }}</span>
                </td>
            </tr>
        </table>

        <h3 style="margin-bottom: 10px;">Detail Transaksi</h3>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>User</th>
                    <th>Film</th>
                    <th>Kursi</th>
                    <th>Status</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_code }}</td>
                        <td>{{ $booking->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ Str::limit($booking->showtime->movie->title, 25) }}</td>
                        <td>{{ $booking->seats->count() }}</td>
                        <td class="status-{{ $booking->status }}">
                            {{ $booking->status === 'paid' ? 'Dibayar' : ($booking->status === 'pending' ? 'Pending' : 'Batal') }}
                        </td>
                        <td class="text-right">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #999;">Tidak ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="footer">
            <p>Laporan ini dihasilkan secara otomatis oleh sistem TechFlow Ticketing.</p>
        </div>
    </div>
</body>
</html>
