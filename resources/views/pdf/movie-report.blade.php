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

        <h3 style="margin-bottom: 10px;">Performa Film</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Film</th>
                    <th>Genre</th>
                    <th class="text-center">Total Jadwal</th>
                    <th class="text-right">Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $index => $movie)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre ?? '-' }}</td>
                        <td class="text-center">{{ $movie->total_showtimes }}</td>
                        <td class="text-right">Rp {{ number_format($movie->total_revenue ?? 0, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #999;">Tidak ada data film</td>
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
