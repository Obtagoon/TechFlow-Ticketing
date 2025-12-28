<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Performa Film - TechFlow Ticketing</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; font-size: 12px; color: #333; }
        .header { background: #e50914; color: white; padding: 20px; text-align: center; }
        .header h1 { font-size: 20px; margin-bottom: 5px; }
        .header p { font-size: 12px; opacity: 0.9; }
        .content { padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f5f5f5; font-weight: 600; color: #333; font-size: 11px; }
        td { font-size: 11px; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .rank-1 { background: #ffd700; color: #000; font-weight: bold; }
        .rank-2 { background: #c0c0c0; color: #000; font-weight: bold; }
        .rank-3 { background: #cd7f32; color: #fff; font-weight: bold; }
        .footer { margin-top: 30px; padding-top: 15px; border-top: 1px solid #eee; font-size: 10px; color: #666; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h1>TechFlow Ticketing</h1>
        <p>Laporan Performa Film</p>
    </div>
    
    <div class="content">
        <p style="margin-bottom: 20px;">
            <strong>Periode:</strong> {{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}<br>
            <strong>Dibuat:</strong> {{ now()->format('d M Y, H:i') }}
        </p>

        <h3 style="margin-bottom: 10px;">Peringkat Film Berdasarkan Pendapatan</h3>
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">Rank</th>
                    <th>Judul Film</th>
                    <th class="text-center">Total Tiket</th>
                    <th class="text-center">Total Transaksi</th>
                    <th class="text-right">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $index => $movie)
                    <tr>
                        <td class="text-center {{ $index < 3 ? 'rank-' . ($index + 1) : '' }}">
                            {{ $index + 1 }}
                        </td>
                        <td>{{ $movie['title'] }}</td>
                        <td class="text-center">{{ $movie['total_seats'] }}</td>
                        <td class="text-center">{{ $movie['total_bookings'] }}</td>
                        <td class="text-right">Rp {{ number_format($movie['total_revenue'], 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #999;">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr style="background: #f5f5f5; font-weight: bold;">
                    <td colspan="2">TOTAL</td>
                    <td class="text-center">{{ collect($movies)->sum('total_seats') }}</td>
                    <td class="text-center">{{ collect($movies)->sum('total_bookings') }}</td>
                    <td class="text-right">Rp {{ number_format(collect($movies)->sum('total_revenue'), 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>Laporan ini dihasilkan secara otomatis oleh sistem TechFlow Ticketing.</p>
        </div>
    </div>
</body>
</html>
