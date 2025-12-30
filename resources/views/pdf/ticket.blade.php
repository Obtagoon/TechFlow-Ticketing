<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Ticket - {{ $booking->booking_code }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f5f5; }
        .ticket { max-width: 400px; margin: 20px auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #e50914 0%, #b20710 100%); color: white; padding: 20px; text-align: center; }
        .header h1 { font-size: 18px; margin-bottom: 4px; }
        .header p { font-size: 12px; opacity: 0.9; }
        .content { padding: 20px; }
        .movie-info { display: flex; gap: 16px; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 2px dashed #eee; }
        .movie-poster { width: 80px; height: 120px; object-fit: cover; border-radius: 8px; }
        .movie-title { font-size: 18px; font-weight: bold; color: #333; margin-bottom: 8px; }
        .movie-meta { font-size: 12px; color: #666; }
        .details { margin-bottom: 20px; }
        .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f0f0f0; }
        .detail-label { color: #666; font-size: 13px; }
        .detail-value { color: #333; font-size: 13px; font-weight: 500; }
        .booking-code { background: #f8f8f8; border-radius: 12px; padding: 20px; text-align: center; margin-bottom: 20px; }
        .booking-code-label { font-size: 12px; color: #666; margin-bottom: 8px; }
        .booking-code-value { font-size: 28px; font-weight: bold; color: #333; letter-spacing: 3px; font-family: monospace; }
        .seats { background: #e50914; border-radius: 8px; padding: 12px; text-align: center; margin-bottom: 20px; }
        .seats-label { font-size: 11px; color: rgba(255,255,255,0.8); margin-bottom: 4px; }
        .seats-value { font-size: 20px; font-weight: bold; color: white; letter-spacing: 2px; }
        .footer { font-size: 11px; color: #999; text-align: center; padding: 16px; border-top: 1px solid #eee; }
        .qr-placeholder { width: 80px; height: 80px; background: #eee; margin: 0 auto 10px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999; }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1>TechFlow Ticketing</h1>
            <p>E-TICKET</p>
        </div>
        
        <div class="content">
            <div class="movie-info">
                <div style="flex: 1;">
                    <div class="movie-title">{{ $booking->showtime->movie->title }}</div>
                    <div class="movie-meta">{{ $booking->showtime->studio->type_label }} • {{ $booking->showtime->movie->duration }} menit</div>
                </div>
            </div>

            <div class="details">
                <div class="detail-row">
                    <span class="detail-label">Bioskop</span>
                    <span class="detail-value">{{ $booking->showtime->studio->cinema->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Studio</span>
                    <span class="detail-value">{{ $booking->showtime->studio->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tanggal</span>
                    <span class="detail-value">{{ $booking->showtime->show_date->format('l, d M Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jam</span>
                    <span class="detail-value">{{ $booking->showtime->formatted_time }} WIB</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Nama</span>
                    <span class="detail-value">{{ $booking->user->name }}</span>
                </div>
            </div>

            <div class="seats">
                <div class="seats-label">KURSI</div>
                <div class="seats-value">{{ $booking->seat_codes }}</div>
            </div>

            <div class="booking-code">
                <div class="booking-code-label">KODE BOOKING</div>
                <div class="booking-code-value">{{ $booking->booking_code }}</div>
            </div>
        </div>

        <div class="footer">
            <p>Tunjukkan kode ini di loket bioskop untuk mendapatkan tiket fisik.</p>
            <p>Datang minimal 30 menit sebelum film dimulai.</p>
        </div>
    </div>
</body>
</html>
