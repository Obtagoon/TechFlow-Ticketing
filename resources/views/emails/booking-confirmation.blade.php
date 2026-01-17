<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0f0f1a;
            margin: 0;
            padding: 20px;
            color: #ffffff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #16162a;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #e50914 0%, #b20710 100%);
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 10px 0 0;
            opacity: 0.9;
        }
        .content {
            padding: 30px;
        }
        .booking-code {
            background-color: #0f0f1a;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            margin-bottom: 25px;
        }
        .booking-code .label {
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .booking-code .code {
            font-size: 28px;
            font-weight: 700;
            color: #e50914;
            margin-top: 5px;
            letter-spacing: 2px;
        }
        .movie-info {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
            background-color: #0f0f1a;
            border-radius: 12px;
            padding: 20px;
        }
        .movie-poster {
            width: 100px;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
        }
        .movie-details h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .movie-details p {
            margin: 5px 0;
            color: #9ca3af;
            font-size: 14px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            color: #9ca3af;
            font-size: 14px;
        }
        .detail-value {
            font-weight: 600;
            font-size: 14px;
        }
        .seats-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: flex-end;
        }
        .seat-badge {
            background-color: #e50914;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }
        .total-section {
            background: linear-gradient(135deg, #e50914 0%, #b20710 100%);
            border-radius: 12px;
            padding: 20px;
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .total-label {
            font-size: 16px;
            opacity: 0.9;
        }
        .total-amount {
            font-size: 24px;
            font-weight: 700;
        }
        .qr-section {
            text-align: center;
            margin-top: 25px;
            padding: 20px;
            background-color: #0f0f1a;
            border-radius: 12px;
        }
        .qr-section p {
            color: #9ca3af;
            font-size: 12px;
            margin-top: 15px;
        }
        .footer {
            text-align: center;
            padding: 25px;
            color: #9ca3af;
            font-size: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .footer p {
            margin: 5px 0;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #e50914 0%, #b20710 100%);
            color: white;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎬 Booking Berhasil!</h1>
            <p>Terima kasih telah memesan tiket di TechFlow Ticketing</p>
        </div>
        
        <div class="content">
            <div class="booking-code">
                <div class="label">Kode Booking</div>
                <div class="code">{{ $booking->booking_code }}</div>
            </div>
            
            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #0f0f1a; border-radius: 12px; margin-bottom: 25px;">
                <tr>
                    @if($booking->showtime->movie->poster)
                    <td width="120" style="padding: 20px;">
                        <img src="{{ $booking->showtime->movie->poster_url }}" alt="{{ $booking->showtime->movie->title }}" style="width: 100px; height: 150px; border-radius: 8px; object-fit: cover;">
                    </td>
                    @endif
                    <td style="padding: 20px; vertical-align: top;">
                        <h2 style="margin: 0 0 10px; font-size: 20px; color: #ffffff;">{{ $booking->showtime->movie->title }}</h2>
                        <p style="margin: 5px 0; color: #9ca3af; font-size: 14px;">{{ $booking->showtime->movie->genre }}</p>
                        <p style="margin: 5px 0; color: #9ca3af; font-size: 14px;">{{ $booking->showtime->movie->duration }} menit</p>
                    </td>
                </tr>
            </table>
            
            <div style="background-color: #0f0f1a; border-radius: 12px; padding: 20px;">
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
                    <span class="detail-value">{{ $booking->showtime->show_date->format('l, d F Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Waktu</span>
                    <span class="detail-value">{{ $booking->showtime->start_time->format('H:i') }} WIB</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Kursi</span>
                    <div class="seats-list">
                        @foreach($booking->tickets as $ticket)
                            <span class="seat-badge">{{ $ticket->seat_code }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Jumlah Tiket</span>
                    <span class="detail-value">{{ $booking->tickets->count() }} tiket</span>
                </div>
            </div>
            
            <div class="total-section">
                <span class="total-label">Total Pembayaran</span>
                <span class="total-amount">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
            </div>
            
            <div class="qr-section">
                @if($booking->qr_code)
                    <img src="{{ $booking->qr_code_url }}" alt="QR Code" style="width: 150px; height: 150px;">
                @endif
                <p>Tunjukkan QR Code ini kepada petugas bioskop saat masuk</p>
            </div>
            
            <div style="text-align: center;">
                <a href="{{ route('booking.ticket', $booking) }}" class="cta-button">
                    Lihat E-Ticket
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p>Harap datang 30 menit sebelum film dimulai</p>
            <p>Jika ada pertanyaan, hubungi customer service kami</p>
            <p style="margin-top: 15px; color: #6b7280;">© {{ date('Y') }} TechFlow Ticketing. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
